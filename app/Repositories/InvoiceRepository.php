<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Patient;
use App\Models\Service;
use App\Repositories\PatientRepository;
use Yajra\DataTables\Facades\DataTables;
use Hash;
use Auth;
use App\Repositories\Component\GlobalComponent;

class InvoiceRepository
{

	public function getDatatable($request)
	{
		
		$from = $request->from;
		$to = $request->to;
		$inv_number = $request->inv_number;
		$conditions = '';
		if ($inv_number!='') {
			$conditions = ' AND inv_number LIKE "%'. intval($inv_number) .'%"';
		}
		$invoices = Invoice::whereBetween('date', [$from, $to])->orderBy('inv_number', 'asc')->get();
		// $invoices = Invoice::whereRaw('date BETWEEN "'. $from .'" AND "'. $to .'"'. $conditions)->orderBy('inv_number', 'asc')->get();

		return Datatables::of($invoices)
			->editColumn('inv_number', function ($invoice) {
				return str_pad($invoice->inv_number, 6, "0", STR_PAD_LEFT);
			})
			->addColumn('sub_total', function ($invoice) {
				return number_format($invoice->invoice_detail_sub_total(), 2);
			})
			->addColumn('discount', function ($invoice) {
				return number_format($invoice->invoice_discount_total(), 2);
			})
			->addColumn('grand_total', function ($invoice) {
				return number_format($invoice->invoice_detail_grand_total(), 2);
			})
			->addColumn('actions', function () {
				$button = '';
				return $button;
			})
			->make(true);
	}

	public function get_edit_detail($id)
	{
		$inv_detail = InvoiceDetail::find($id);
		$service = $inv_detail->service;
		return $inv_detail;
	}

	public function getInvoicePreview($id)
	{
		$GlobalComponent = new GlobalComponent;

		$no = 1;
		$total = 0;
		$total_discount = 0;
		$grand_total = 0;
		$invoice_detail = '';
		$tbody = '';

		$invoice = Invoice::find($id);

		$title = 'Invoice (INV'. date('Y', strtotime($invoice->date)) .'-'.str_pad($invoice->inv_number, 6, "0", STR_PAD_LEFT) .')';

		foreach ($invoice->invoice_details as $invoice_detail) {
			$quantity = ($invoice_detail->quantity);
			$price = ($invoice_detail->amount);
			$amount=$quantity*$price;
			$total += $amount;
			$tbody .= '<tr>
									<td class="text-center">' . $no++ . '</td>
									<td>' . $invoice_detail->name . '</td>
									<td>' . $quantity . '</td>
									<td class="text-right"><span class="pull-left float-left">៛</span> ' . $price . '</td>
									<td class="text-right"><span class="pull-left float-left">៛</span> ' . number_format($amount, 0) . '</td>
								</tr>';
		}
		// $total_dollar = number_format($total/$invoice->rate, 2);
		$total_dollar = number_format($total/4100, 2);

		
		$gtt = explode(".", number_format($total_dollar,2));
		$gtt_dollars = $gtt[0];
		$gtt_cents = $gtt[1];

		$grand_total_in_word = Auth::user()->num2khtext($gtt_dollars, false) . 'ដុល្លារ' . (($gtt_cents>0)? Auth::user()->num2khtext($gtt_cents, false) .'សេន' : '');
		$grand_total_riel_in_word = Auth::user()->num2khtext(round($total, 0), false);

		$invoice_detail = '<section class="invoice-print" style="position: relative;">
			' . $GlobalComponent->PrintHeader('invoice', $invoice) . '
			<table class="table-detail" width="100%">
				<thead>
					<th class="text-center" width="8%">
						<div>ល.រ</div>
					</th>
					<th class="text-center" width="40%">
						<div>ឈ្មោះ</div>
					</th>
					
					<th class="text-center" width="12%">
						<div>ចំនួន</div>
					</th>
					
					<th class="text-center" width="20%">
						<div>តម្លៃរាយ</div>
					</th>
					<th class="text-center" width="20%">
						<div>តម្លៃសរុប</div>
					</th>
				</thead>
				<tbody>
					'. $tbody .'
				</tbody>
				<tfoot>
					<tr>
						<th colspan="3"><small>*** '. $grand_total_riel_in_word .'រៀល ***</small></th>
						<th class="text-right">សរុបជាប្រាក់រៀល</th>
						<th class="text-right sub_total_dollar"><span class="float-left pull-left">៛</span> '. number_format($total, 0) .'</th>
					</tr>
					
					<tr>
						<th colspan="3"><small>*** '. $grand_total_in_word .' ***</small></th>
						<th class="text-right">សរុបជាប្រាក់ដុល្លារ</th>
						<th class="text-right sub_total_dollar"><span class="float-left pull-left">$</span> '. number_format($total_dollar, 2) .'</th>
					</tr>
				</tfoot>
			</table>
			<small class="remark">'. $invoice->remark .'</small>
			<br/>
			' . $GlobalComponent->FooterComeBackText('សូមយកវិក្កយបត្រនេះមកវិញពេលមកពិនិត្យលើកក្រោយ') . '
			<table class="table-footer" width="100%">
			' . $GlobalComponent->DoctorSignature() . '
			</table>
		</section>';
		return response()->json(['invoice_detail' => $invoice_detail, 'title' => $title]);
		// return $invoice_detail;
	}

	public function inv_number()
	{
		$invoice = Invoice::whereYear('date', date('Y'))->orderBy('inv_number', 'desc')->first();
		return (($invoice === null) ? '000001' : $invoice->inv_number + 1);
	}

	public function create($request)
	{
		$request->patient_id = GlobalComponent::GetPatientIdOrCreate($request);
		$invoice = Invoice::create(GlobalComponent::MergeRequestPatient($request, [
			'date' => $request->date,
			'inv_number' => $request->inv_number,
			'rate' => $request->exchange_rate,
			'pt_diagnosis' => $request->pt_diagnosis,
			'status' => (($request->status==null)? 0 : 1),
			'remark' => $request->remark,
			'created_by' => Auth::user()->id,
			'updated_by' => Auth::user()->id,
		]));
		
		if (isset($request->service_name) && isset($request->price) && isset($request->description)) {
			for ($i = 0; $i < count($request->service_name); $i++) {
				InvoiceDetail::create([
					'name' => $request->service_name[$i],
					'quantity' => $request->quantity[$i],
					'amount' => $request->price[$i],
					// 'discount' => $request->discount[$i],
					'description' => $request->description[$i],
					'index' => $i + 1,
					'service_id' => $this->get_service_id_or_create($request->service_name[$i], $request->price[$i], $request->description[$i]),
					'invoice_id' => $invoice->id,
					'created_by' => Auth::user()->id,
					'updated_by' => Auth::user()->id,
				]);
			}
		}

		return $invoice;
	}

	public function invoiceDetailStore($request)
	{
		$invoice = Invoice::find($request->invoice_id);
		$last_item = $invoice->invoice_details()->first();
		$index = (($last_item !== null) ? $last_item->index + 1 : 1);

		$invoice_detail = InvoiceDetail::create([
												'name' => $request->service_name,
												// 'discount' => $request->discount,
												'quantity' => $request->quantity,
												'amount' => $request->price,
												'description' => $request->description,
												'index' => $index,
												'service_id' => $this->get_service_id_or_create($request->service_name, $request->price, $request->description),
												'invoice_id' => $request->invoice_id,
												'created_by' => Auth::user()->id,
												'updated_by' => Auth::user()->id,
											]);

		$json = $this->getInvoicePreview($invoice_detail->invoice_id)->getData();

		return response()->json([
			'success'=>'success',
			'invoice_detail' => $invoice_detail,
			'invoice_preview' => $json->invoice_detail,
		]);

	}
	public function invoiceDetailUpdate($request)
	{
		$invoice_detail = InvoiceDetail::find($request->id);
		$invoice_detail->update([
			'name' => $request->service_name,
			'quantity' => $request->quantity,
			'amount' => $request->price,
			// 'discount' => $request->discount,
			'description' => $request->description,
			'service_id' => $this->get_service_id_or_create($request->service_name, $request->price, $request->description),
			'updated_by' => Auth::user()->id,
		]);

		$json = $this->getInvoicePreview($invoice_detail->invoice_id)->getData();
		return response()->json([
			'success'=>'success',
			'invoice_detail' => $invoice_detail,
			'invoice_preview' => $json->invoice_detail,
		]);
	}

	public function save_order($request)
	{
		$order = explode(',', $request->order_ids);
		$ids = explode(',', $request->item_ids);

		for ($i = 0; $i < count($ids); $i++) {
			$invoice_detail = InvoiceDetail::find($ids[$i])
				->update([
					'index' => $order[$i],
					'updated_by' => Auth::user()->id,
				]);
		}
		return 'success';
	}

	public function update($request, $invoice)
	{
		$invoice->update(GlobalComponent::MergeRequestPatient($request, [
			'date' => $request->date,
			'inv_number' => $request->inv_number,
			'rate' => $request->exchange_rate,
			'pt_diagnosis' => $request->pt_diagnosis,
			'status' => (($request->status==null)? 0 : 1),
			'remark' => $request->remark,
			'updated_by' => Auth::user()->id,
		]));
		return $invoice;
	}

	public function status($request)
	{
		$invoice = Invoice::find($request->id);
		$status = $invoice->status;
		$invoice->update([
			'status' => (($status==0)? '1' : '0'),
		]);

		return $invoice;
	}

	public function destroy($request, $invoice)
	{
		if (Hash::check($request->passwordDelete, Auth::user()->password)) {
			$inv_number = $invoice->inv_number;
			if ($invoice->delete()) {

				return $inv_number;
			}
		} else {
			return false;
		}
	}

	public function destroy_invoice_detail($invoice_detail)
	{
		$inv_number = $invoice_detail->invoice->inv_number;
		if ($invoice_detail->delete()) {
				
			return $inv_number;
		}
		

	}

	public function deleteInvoiceDetail($request)
	{
		$invoice_detail = InvoiceDetail::find($request->id);
		$invoice_id = $invoice_detail->invoice_id;
		$invoice_detail->delete();
		$json = $this->getInvoicePreview($invoice_id)->getData();

		return response()->json([
			'success'=>'success',
			'invoice_preview' => $json->invoice_detail,
		]);
	}

	public function get_service_id_or_create($name = '', $price = 0, $description = '')
	{
		$name = trim($name);
		$service = Service::where('name', $name)->first();

		if ($service != null) return $service->id;
		$created_service = Service::create([
			'name' => $name,
			'price' => $price,
			'description' => $description,
			'created_by' => Auth::user()->id,
			'updated_by' => Auth::user()->id,
		]);
		return $created_service->id;
	}
}
