<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Labor;
use App\Models\LaborCategory;
use App\Models\LaborService;
use App\Models\LaborDetail;
use App\Models\Patient;
use App\Models\Service;
use App\Repositories\PatientRepository;
use Yajra\DataTables\Facades\DataTables;
use Hash;
use Auth;
use DB;
use App\Repositories\Component\GlobalComponent;


class LaborRepository
{

	public function getDatatable($request)
	{
		
		$from = $request->from;
		$to = $request->to;
		$labor_number = $request->labor_number;
		$conditions = '';
		if ($labor_number!='') {
			$conditions = ' AND labor_number LIKE "%'. intval($labor_number) .'%"';
		}
		$labors = Labor::select('*', DB::raw("CONCAT('៛ ', FORMAT(price, 0)) as formated_price"))->whereBetween('date', [$from, $to])->orderBy('labor_number', 'asc')->get();

		return Datatables::of($labors)
			->editColumn('labor_number', function ($labor) {
				return str_pad($labor->labor_number, 6, "0", STR_PAD_LEFT);
			})
			->addColumn('actions', function () {
				$button = '';
				return $button;
			})
			->make(true);
	}

	public function getReport($request)
	{
		$GlobalComponent = new GlobalComponent;
		$from = $request->from;
		$to = $request->to;
		$tbody = '';
		$conditions = '';
		$pt_id = $request->pt_id;
		if ($pt_id!='') {
			$conditions = ' AND patient_id = '.$pt_id;
		}
		$labors = Labor::whereRaw('date BETWEEN "'. $from .'" AND "'. $to .'"'. $conditions)->orderBy('labor_number', 'asc')->get();
		$total_patient = 0;
		$total_amount = 0;
		foreach ($labors as $key => $labor) {
			$total_patient++;
			$total_amount += $labor->price;
			
			$tbody .= '<tr>
							<td class="text-center">'. str_pad($labor->labor_number, 6, "0", STR_PAD_LEFT) .'</td>
							<td class="text-center">'. date('d/M/Y', strtotime($labor->date)) .'</td>
							<td class="text-center font-weight-bold">៛ '. number_format($labor->price, 0) .'</td>
							<td>'. $labor->pt_name .'</td>
							<td class="text-center">'. $labor->pt_age . ' ' . __('module.table.selection.age_type_' . $labor->pt_age_type) . '</td>
							<td class="text-center">'. $labor->pt_gender .'</td>
							<td class="text-right">
							<button class="btn btn-sm btn-info" onclick="getDetail('. $labor->id .')"><i class="fa fa-list"></i></button>
							<div class="sr-only" id="detail-'. $labor->id .'">'. $this->getLaborPreview($labor->id)->getData()->labor_detail .'</div>
							</td>
						</tr>';
		}

		return response()->json([
			'tbody' => $tbody,
			'total_patient' => $total_patient .' នាក់',
			'total_amount' => '៛ ' . number_format($total_amount, 0),
		]);

	}

	public function getCheckedServicesList($type)
	{
		$ids = [];
		$no = 0;
		$checked_services_list = '';
		if ($type == 'glycemia') {
			$ids = [2];
		}else if ($type == 'labor-bio') {
			$ids = [2];
		}else if ($type == 'serologie') {
			$ids = [3,4];
		}else if ($type == 'urine') {
			$ids = [5];
		}else if ($type == 'test-labor') {
			$ids = [6];
		}else if ($type == 'blood-test') {
			$ids = [9,10,11,12];
		}
		
		$blood_test_category = [];
		$labor_categories = LaborCategory::whereIn('id', $ids)->get();
		foreach ($labor_categories as $key => $labor_category) {
			if ($type == 'glycemia') {

				$service = $labor_category->services()->where('name', 'Glycémie')->first();
				$reference = '';
				if ($service->ref_from == '' && $service->ref_to != '') {
					$reference = '('. $service->description .' <'. $service->ref_to .' '. $service->unit .')';
				}else if($service->ref_from != '' && $service->ref_to ==''){
					$reference = '('. $service->description .' '. $service->ref_from .'> '. $service->unit .')';
				}else if($service->ref_from != '' && $service->ref_to!=''){
					$reference = '('. $service->description .' '. $service->ref_from .'-'. $service->ref_to .' '. $service->unit .')';
				}else{
					$reference = '';
				}
				
				$checked_services_list .= '<tr class="labor_item" id="1-'.$service->id .'">
													<td class="text-center">1</td>
													<td>
														<input type="hidden" name="service_id[]" value="'. $service->id .'">
														<input type="hidden" name="service_name[]" value="'. $service->name .'">
														'. $service->name .'
													</td>
													<td>
														'. $service->category->name .'
													</td>
													<td class="text-center">
														<input type="text" name="result[]" value="'. $service->default_value .'" class="form-control">
													</td>
													<td class="text-center">
														<input type="hidden" name="unit[]" value="">
														'. $service->unit .'
													</td>
													<td class="text-center">
														<input type="hidden" name="reference[]" value="'. $reference .'">
														'. $reference .'
													</td>
													<td class="text-center sr-only">
														<button type="button" onclick="removeCheckedService(\'1'.$service->id .'\')" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-alt"></i></button>
													</td>
												</tr>';
			}else if ($type == 'blood-test') {
				$checked_services_list = '';
				$labor_category_services = $labor_category->services;
				if (in_array($labor_category->id, [10, 11, 12]) && sizeof($labor_category_services) > 1) {
					$checked_services_list .= '
						<a>
							<label class="text"><input type="checkbox" class="category_check_all"/> Check all<label>
						</a>
					';
				}

				foreach ($labor_category_services as $jey => $service) {
					$reference = '';
					// if ($service->ref_from == '' && $service->ref_to != '') {
					// 	$reference = '('. $service->description .' <'. $service->ref_to .' '. $service->unit .')';
					// }else if($service->ref_from != '' && $service->ref_to ==''){
					// 	$reference = '('. $service->description .' '. $service->ref_from .'> '. $service->unit .')';
					// }else 
					if($service->ref_from != '' && $service->ref_to!=''){
						$reference = '('. $service->description .' '. $service->ref_from .'-'. $service->ref_to .' '. $service->unit .')';
					}
					if ($service->description == 'main') {
						$checked_services_list .= '<li class="bg-info color-palette">
														<i class="fa fa-level-up-alt" style="transform: rotateZ(90deg);"></i>
														<div class="icheck-primary d-inline ml-2">
															<input type="checkbox" class="main_chbox" data-id="'. $service->id .'"/>
														</div>
														<span class="text">'. $service->name .'</span>
													</li>';
					}else if ($service->description == 'sub') {
						$checked_services_list .= '<li class="ml-4">
														<i class="fa fa-level-up-alt" style="transform: rotateZ(90deg);"></i>
														<div class="icheck-primary d-inline ml-2">
															<input type="checkbox" class="sub_chbox sub_chbox_'.  $service->sub_of .'" data-id="'. $service->id .'"/>
														</div>
														<span class="text">'. $service->name .'</span>
													</li>';
					}else{
						$servicename='';
						if($service->name == 'Neutrophils (%)'){$servicename='80%';}
						else if($service->name == 'Lymphocytes (%)'){$servicename='15%';}
						else if($service->name == 'Monophocytes (%)'){$servicename='03%';}
						else if($service->name == 'Eosinophils (%)'){$servicename='02%';}
						else {$servicename='00%';}
						$checked_services_list .= '<li class="'. $service->class .'">
							<i class="fa fa-level-up-alt" style="transform: rotateZ(90deg);"></i>
							<div class="icheck-primary d-inline ml-2">
								<input type="checkbox" value="'. $service->id .'" class="service_id child_chbox_'.  $service->sub_of .'" data-value="'. $service->id .'" name="service_id[]"/>
							</div>
							<span class="text">'. $service->name .'</span>
							<span>
								'.(($service->unit == 'Negative')?
										'<div class="input-group">
											<select name="result[]" class="form-control child_input_'. $service->sub_of .' toggle-'. $service->id .'" disabled>
												<option value="Negative">Negative</option>
												<option value="Positive">Positive</option>
											</select>
											<div class="input-group-append">
												<span class="input-group-text text-xs px-1 font-weight-bold">'. $reference .'</span>
											</div>
										</div>'
									:
										'<div class="input-group">
											'.(($service->sub_of=='87')?'<input type="text" class="form-control child_input_'. $service->sub_of .'
											 toggle-'. $service->id .'" value="'.$servicename.'" name="" disabled readonly/><input type="text" class="form-control child_input_'. $service->sub_of .' toggle-'. $service->id .'" value="'. $service->default_value .'" name="result[]" disabled/>':(($service->sub_of=='115') ? '<select  class="form-control child_input_'. $service->sub_of .' toggle-'. $service->id .'" value="'. $service->default_value .'" name="result[]" disabled/>
											 <option value=""></option><option value="1/160">1/160</option><option value="1/320">1/320</option></select>' : '<input type="text" class="form-control child_input_'. $service->sub_of .' toggle-'. $service->id .'" value="'. $service->default_value .'" name="result[]" disabled/>').'
											<div class="input-group-append">
												<span class="input-group-text text-xs px-1 font-weight-bold">'. $reference .'</span>
											</div>
										</div>'
								)).'
							</span>
						</li>';
					}
				}
				
				$blood_test_category[$labor_category->name] ='<div class="card card-primary">
																<div class="card-header">
																	<h3 class="card-title">'. $labor_category->name .'</h3>
																</div>
																<div class="card-body">
																<ul class="todo-list ui-sortable" data-widget="todo-list">
																	'. $checked_services_list .'
																</div>
															</div>';
			}else{
				foreach ($labor_category->services as $jey => $service) {
					
					$reference = '';
					if ($service->ref_from == '' && $service->ref_to != '') {
						$reference = '('. $service->description .' <'. $service->ref_to .' '. $service->unit .')';
					}else if($service->ref_from != '' && $service->ref_to ==''){
						$reference = '('. $service->description .' '. $service->ref_from .'> '. $service->unit .')';
					}else if($service->ref_from != '' && $service->ref_to!=''){
						$reference = '('. $service->description .' '. $service->ref_from .'-'. $service->ref_to .' '. $service->unit .')';
					}else{
						$reference = '';
					}
					
					if ($service->unit == 'Negative') {
						$checked_services_list .= '<tr class="labor_item" id="'. $jey.'-'.$service->id .'">
																				<td class="text-center">'. $jey .'</td>
																				<td>
																					<input type="hidden" name="service_id[]" value="'. $service->id .'">
																					<input type="hidden" name="service_name[]" value="'. $service->name .'">
																					'. $service->name .'
																				</td>
																				<td>
																					'. $service->category->name .'
																				</td>
																				<td class="text-center">
																					<select name="result[]" class="form-control">
																						<option value="Negative">Negative</option>
																						<option value="Positive">Positive</option>
																					</select>
																				</td>
																				<td class="text-center">
																					<input type="hidden" name="unit[]" value="">
																					
																				</td>
																				<td class="text-center">
																					<input type="hidden" name="reference[]" value="'. $reference .'">
																					'. $reference .'
																				</td>
																				<td class="text-center sr-only">
																					<button type="button" onclick="removeCheckedService(\''. $jey.'-'.$service->id .'\')" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-alt"></i></button>
																				</td>
																			</tr>';
					}else{
						$checked_services_list .= '<tr class="labor_item" id="'. $jey.'-'.$service->id .'">
												<td class="text-center">'. $jey .'</td>
												<td>
													<input type="hidden" name="service_id[]" value="'. $service->id .'">
													<input type="hidden" name="service_name[]" value="'. $service->name .'">
													'. $service->name .'
												</td>
												<td>
													'. $service->category->name .'
												</td>
												<td class="text-center">
													<input type="text" name="result[]" value="'. $service->default_value .'" class="form-control">
												</td>
												<td class="text-center">
													<input type="hidden" name="unit[]" value="">
													'. $service->unit .'
												</td>
												<td class="text-center">
													<input type="hidden" name="reference[]" value="'. $reference .'">
													'. $reference .'
												</td>
												<td class="text-center sr-only">
													<button type="button" onclick="removeCheckedService(\''. $jey.'-'.$service->id .'\')" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-alt"></i></button>
												</td>
											</tr>';
					}
		
				}
			}
		}

		if ($type == 'blood-test') {
			return '<div class="row">
						<div class="col-sm-3 px-0">
							'. $blood_test_category['HEMATOLOGY'] .'
						</div>
						<div class="col-sm-3 pr-0">
							'. $blood_test_category['BIOCHEMISTRY'] .'
						</div>
						<div class="col-sm-3 pr-0">
							'. $blood_test_category['SEROLOGY'] .'
						</div>
						<div class="col-sm-3 pr-0">
							'. $blood_test_category['MICROBIOLOGY'] .'
						</div>
					</div>';
		} else {
			return '<table class="table table-bordered" width="100%">
						<thead>
							<tr>
								<th width="60px">'. __('module.table.no') .'</th>
								<th>'. __('module.table.name') .'</th>
								<th width="250px">'. __('module.table.labor.category') .'</th>
								<th width="200px">'. __('module.table.labor.result') .'</th>
								<th width="200px">'. __('module.table.labor_service.unit') .'</th>
								<th width="200px">'. __('module.table.labor_service.reference') .'</th>
								<th width="90px" class="sr-only">'. __('module.table.action') .'</th>
							</tr>
						</thead>
						<tbody class="item_list">
							'. $checked_services_list .'
						</tbody>
					</table>';
		}
	}

	public function getLaborDetail($id, $type)
	{ 
		$blood_test_category = [];
		$labor_detail_list = '';
		$labor = Labor::find($id);
		$hematology = '';
		$biologie = '';
		$urine = '';
		$serologie = '';
		$blood_type = '';
		if ($type == 'blood-test') {
			$ids = [9,10,11,12];
			$blood_test_category = [];
			$labor_categories = LaborCategory::whereIn('id', $ids)->get();
			foreach ($labor_categories as $key => $labor_category) {
				$checked_services_list = '';
				$labor_category_services = $labor_category->services;

				if (in_array($labor_category->id, [10, 11, 12]) && sizeof($labor_category_services) > 1) {
					$checked_services_list .= '
						<a>
							<label class="text"><input type="checkbox" class="category_check_all"/> Check all<label>
						</a>
					';
				}

				foreach ($labor_category_services as $jey => $service) {
					$reference = '';
					// if ($service->ref_from == '' && $service->ref_to != '') {
					// 	$reference = '('. $service->description .' <'. $service->ref_to .' '. $service->unit .')';
					// }else if($service->ref_from != '' && $service->ref_to ==''){
					// 	$reference = '('. $service->description .' '. $service->ref_from .'> '. $service->unit .')';
					// }else 
					if($service->ref_from != '' && $service->ref_to!=''){
						$reference = '('. $service->description .' '. $service->ref_from .' - '. $service->ref_to .' '. $service->unit .')';
					}
					if ($service->description == 'main') {
						$checked_services_list .= '<li class="bg-info color-palette">
														<i class="fa fa-level-up-alt" style="transform: rotateZ(90deg);"></i>
														<div class="icheck-primary d-inline ml-2">
															<input type="checkbox" class="main_chbox" data-id="'. $service->id .'"/>
														</div>
														<span class="text">'. $service->name .'</span>
													</li>';
					}else if ($service->description == 'sub') {
						$checked_services_list .= '<li class="ml-4">
														<i class="fa fa-level-up-alt" style="transform: rotateZ(90deg);"></i>
														<div class="icheck-primary d-inline ml-2">
															<input type="checkbox" class="sub_chbox sub_chbox_'. $service->sub_of .'" data-id="'. $service->id .'"/>
														</div>
														<span class="text">kk :'. $service->name .'</span>
													</li>';
					}else{
						
					$servicename='';
					if($service->name == 'Neutrophils (%)'){$servicename='80%';}
					else if($service->name == 'Lymphocytes (%)'){$servicename='15%';}
					else if($service->name == 'Monophocytes (%)'){$servicename='03%';}
					else if($service->name == 'Eosinophils (%)'){$servicename='02%';}
					else {$servicename='00%';}
						$labor_detail = LaborDetail::where('labor_id', $id)->where('service_id', $service->id)->first();
						$checked_services_list .= '<li class="'. $service->class .'">
													<i class="fa fa-level-up-alt" style="transform: rotateZ(90deg);"></i>
													<div class="icheck-primary d-inline ml-2">
														<input type="checkbox" value="'. (($labor_detail!=null)? $labor_detail->id : $service->id) .'" class="service_id child_chbox_'. $service->sub_of .'" data-value="'. (($labor_detail!=null)? $labor_detail->id : $service->id) .'" '. (($labor_detail!=null)? 'name="labor_detail_ids[]" checked' : 'name="service_ids[]"') .'/>
													</div>
													<span class="text">'. $service->name .'</span>
													<span>
														'.(($service->unit == 'Negative')?
																'<div class="input-group">
																	<select class="form-control child_input_'. $service->sub_of .' toggle-'. (($labor_detail!=null)? $labor_detail->id : $service->id) .'" '. (($labor_detail!=null)? 'name="labor_detail_result[]" ' : 'name="service_result[]" disabled') .'>
																		<option value="Negative" '. (($labor_detail!=null && $labor_detail->result=="Negative")? 'selected' : '') .'>Negative</option>
																		<option value="Positive" '. (($labor_detail!=null && $labor_detail->result=="Positive")? 'selected' : '') .'>Positive</option>
																	</select>
																	<div class="input-group-append">
																		<span class="input-group-text text-xs px-1 font-weight-bold">'. $reference .'</span>
																	</div>
																</div>'
															:
																'<div class="input-group">
																'.(($service->sub_of=='87')?'<input type="text" class="form-control child_input_'. $service->sub_of .' toggle-'. $service->id .'" value="'.$servicename.'" name="" disabled readonly/><input type="text" class="form-control child_input_'. $service->sub_of .' toggle-'. (($labor_detail!=null)? $labor_detail->id : $service->id) .'" value="'. (($labor_detail!=null)? $labor_detail->result : $service->default_value) .'" '. (($labor_detail!=null)? 'name="labor_detail_result[]" checked' : 'name="service_result[]" disabled') .'/>':(($service->sub_of=='115') ? '
																 	<select  class="form-control child_input_'. $service->sub_of .' toggle-'. (($labor_detail!=null)? $labor_detail->id : $service->id) .'" '. (($labor_detail!=null)? 'name="labor_detail_result[]" checked' : 'name="service_result[]" disabled required') .'/>
																 		<option value="" '. (($labor_detail==null)? 'selected' : '') .'></option>
																 		<option value="1/160"'. (($labor_detail!=null && $labor_detail->result=='1/160')? 'selected' : '') .'>1/160</option>
																 		<option value="1/320" '. (($labor_detail!=null && $labor_detail->result=='1/320')? 'selected' : '') .'>1/320</option>
															 		</select>
															 	':'<input type="text" class="form-control child_input_'. $service->sub_of .' toggle-'. (($labor_detail!=null)? $labor_detail->id : $service->id) .'" value="'. (($labor_detail!=null)? $labor_detail->result : $service->default_value) .'" '. (($labor_detail!=null)? 'name="labor_detail_result[]" checked' : 'name="service_result[]" disabled') .'/>').'	
											 
											
																<div class="input-group-append">
																	<span class="input-group-text text-xs px-1 font-weight-bold">'. $reference .'</span>
																</div>
															</div>'
														)).'
													</span>
												</li>';
					}
				}
			
				$blood_test_category[$labor_category->name] ='<div class="card card-primary">
																<div class="card-header">
																	<h3 class="card-title">'. $labor_category->name .'</h3>
																</div>
																<div class="card-body">
																<ul class="todo-list ui-sortable" data-widget="todo-list">
																	'. $checked_services_list .'
																</div>
															</div>';
			}
			
		} else {
			foreach ($labor->labor_details as $order => $labor_detail) {
				
				$reference = '';
				if ($labor_detail->service->ref_from == '' && $labor_detail->service->ref_to != '') {
					$reference = '(<'. $labor_detail->service->ref_to .' '. $labor_detail->service->unit .')';
				}else if($labor_detail->service->ref_from != '' && $labor_detail->service->ref_to ==''){
					$reference = '('. $labor_detail->service->ref_from .'> '. $labor_detail->service->unit .')';
				}else if($labor_detail->service->ref_from != '' && $labor_detail->service->ref_to!=''){
					$reference = '('. $labor_detail->service->ref_from .'-'. $labor_detail->service->ref_to .' '. $labor_detail->service->unit .')';
				}else{
					$reference = '';
				}
	
				if ($labor_detail->service->unit == 'Negative') {
					$labor_detail_list .= '<tr class="labor_item" id="'. $labor_detail->result .'">
																	<td class="text-center">'. ++$order .'</td>
																	<td>
																		<input type="hidden" name="labor_detail_ids[]" value="'. $labor_detail->id .'">
																		'. $labor_detail->name .'
																	</td>
																	<td>
																		'. $labor_detail->service->category->name .'
																	</td>
																	<td class="text-center">
																		<select name="result[]" class="form-control">
																			<option value="Negative" '. (($labor_detail->result=="Negative")? 'selected' : '') .'>Negative</option>
																			<option value="Positive" '. (($labor_detail->result=="Positive")? 'selected' : '') .'>Positive</option>
																		</select>
																	</td>
																	<td class="text-center">
																		<input type="hidden" name="unit[]" value="">
	
																	</td>
																	<td class="text-center">
																		'. $reference .'
																	</td>
																	<td class="text-center sr-only">
																		<button type="button" onclick="deleteLaborDetail(\''. $labor_detail->id .'\')" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-alt"></i></button>
																	</td>
																</tr>';
				}else{
					$labor_detail_list .= '<tr class="labor_item" id="'. $labor_detail->result .'">
																	<td class="text-center">'. ++$order .'</td>
																	<td>
																		<input type="hidden" name="labor_detail_ids[]" value="'. $labor_detail->id .'">
																		'. $labor_detail->name .'
																	</td>
																	<td>
																		'. $labor_detail->service->category->name .'
																	</td>
																	<td class="text-center">
																		<input type="text" name="result[]" value="'. $labor_detail->result .'" class="form-control"/>
																	</td>
																	<td class="text-center">
																		<input type="hidden" name="unit[]" value="">
																		'. $labor_detail->service->unit .'
																	</td>
																	<td class="text-center">
																		'. $reference .'
																	</td>
																	<td class="text-center sr-only">
																		<button type="button" onclick="deleteLaborDetail(\''. $labor_detail->id .'\')" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-alt"></i></button>
																	</td>
																</tr>';
				}
	
			}
		}
		
		if ($type == 'blood-test') {
			return '<div class="row">
						<div class="col-sm-3 px-0">
							'. $blood_test_category['HEMATOLOGY'] .'
						</div>
						<div class="col-sm-3 pr-0">
							'. $blood_test_category['BIOCHEMISTRY'] .'
						</div>
						<div class="col-sm-3 pr-0">
							'. $blood_test_category['SEROLOGY'] .'
						</div>
						<div class="col-sm-3 pr-0">
							'. $blood_test_category['MICROBIOLOGY'] .'
						</div>
					</div>';
		} else {
			return '<table class="table table-bordered" width="100%">
						<thead>
							<tr>
								<th width="60px">'. __('module.table.no') .'</th>
								<th>'. __('module.table.name') .'</th>
								<th width="250px">'. __('module.table.labor.category') .'</th>
								<th width="200px">'. __('module.table.labor.result') .'</th>
								<th width="200px">'. __('module.table.labor_service.unit') .'</th>
								<th width="200px">'. __('module.table.labor_service.reference') .'</th>
								<th width="90px" class="sr-only">'. __('module.table.action') .'</th>
							</tr>
						</thead>
						<tbody class="item_list">
							'. $labor_detail_list .'
						</tbody>
					</table>';
		}
	}

	public function storeAndGetLaborDetail($request)
	{

		$labor = Labor::find($request->labor_id);
		$labor_services = LaborService::select(DB::raw("id, name, category_id, unit, description, CONCAT(`ref_from`,' - ',`ref_to`) AS reference"))->whereIn('id', $request->service_ids)->get();
		foreach ($labor_services as $key => $service) {
			LaborDetail::create([
				'name' => $service->name,
				'unit' => '',
				'service_id' => $service->id,
				'labor_id' => $labor->id,
				'created_by' => Auth::user()->id,
				'updated_by' => Auth::user()->id,
			]);
		}


		$json = $this->getLaborPreview($request->labor_id)->getData();

		return response()->json([
			'labor_detail_list' => $this->getLaborDetail($request->labor_id),
			'labor_preview' => $json->labor_detail,
		]);
	}

	public function get_edit_detail($id)
	{
		$labor_detail = LaborDetail::find($id);
		$service = $labor_detail->service;
		return $labor_detail;
	}

	public $main= '';
	public $sub= '';
	public function subService($service)
	{
		if ($service != '' && ($this->main != $service->name) && ($this->sub != $service->name)) {
			$bold = '';
			if ($service->description == 'main') {
				$this->main = $service->name;
				$bold = 'font-weight-bold';
			}else{
				$this->sub= '';
				$this->sub = $service->name;
			}
			$list = '<tr>
						<td colspan="4"><div class="'. (($service->description == 'sub')? 'ml-4 font-weight-bold' : $service->class) .' '. $bold .'">'. $service->name .'</div></td>
					</tr>';
			return $this->subService($service->labor_service) . $list;
		}

		return '';
	}

	public function getLaborPreview($id)
	{
		$GlobalComponent = new GlobalComponent;

		$labor_detail = '';
		$labor_detail_item_list = '';
		$labor = Labor::find($id);

		$title = 'Labor ('. str_pad($labor->labor_number, 6, "0", STR_PAD_LEFT) .')';

		
		if ($labor->type == 'glycemia') {
			$glycemia ='';
			foreach ($labor->labor_details as $jey => $labor_detail) {
				$reference = '';
				if ($labor_detail->service->ref_from == '' && $labor_detail->service->ref_to != '') {
					$reference = '('. $labor_detail->service->description .' <'. $labor_detail->service->ref_to .' '. $labor_detail->service->unit .')';
				}else if($labor_detail->service->ref_from != '' && $labor_detail->service->ref_to ==''){
					$reference = '('. $labor_detail->service->description .' '. $labor_detail->service->ref_from .'> '. $labor_detail->service->unit .')';
				}else if($labor_detail->service->ref_from != '' && $labor_detail->service->ref_to!=''){
					$reference = '('. $labor_detail->service->description .' '. $labor_detail->service->ref_from .'-'. $labor_detail->service->ref_to .' '. $labor_detail->service->unit .')';
				}else{
					$reference = '';
				}

				$class = '';
				if ($labor_detail->result < $labor_detail->service->ref_from) {
					$class = 'color_green';
				}else if ($labor_detail->result > $labor_detail->service->ref_to) {
					$class = 'color_red';
				}
				
				if ($labor_detail->result== 'Positive' || $labor_detail->result== 'Positive' || $labor_detail->result== 'Positive') {
					$class = 'color_red';
				}

				$glycemia .= '<tr>
					<td width="25%" style="padding: 6px 0 6px 0.5cm;">- '. $labor_detail->name .'</td>
					<td width="25%" class="'. $class .'">: '. $labor_detail->result .'</td>
					<td width="25%">'. (($labor_detail->service->unit=='Negative')? '' : $labor_detail->service->unit.' ' ) .'</td>
					<td width="25%">'. $reference .'</td>
				</tr>';
			}
			
			$labor_detail_item_list = '<div style="padding: 0 1.3cm;">
																	<table width="100%">
																		<tr>
																			<td colspan="4"> <b style="text-decoration:underline;"><h1>Hel</h1>BIO-CHIMIE</b></td>
																		</tr>
																		'. $glycemia .'
																	</table>	
																</div>';
		
		}else if ($labor->type == 'labor-bio') {
			$bio ='';
			$bio_bottom ='';
			foreach ($labor->labor_details as $jey => $labor_detail) {
				$reference = $labor_detail->service->ref_from .'-'.  $labor_detail->service->ref_to;
				
				$reference = '';
				if ($labor_detail->service->ref_from == '' && $labor_detail->service->ref_to != '') {
					$reference = '('. $labor_detail->service->description .' <'. $labor_detail->service->ref_to .' '. $labor_detail->service->unit .')';
				}else if($labor_detail->service->ref_from != '' && $labor_detail->service->ref_to ==''){
					$reference = '('. $labor_detail->service->description .' '. $labor_detail->service->ref_from .'> '. $labor_detail->service->unit .')';
				}else if($labor_detail->service->ref_from != '' && $labor_detail->service->ref_to!=''){
					$reference = '('. $labor_detail->service->description .' '. $labor_detail->service->ref_from .'-'. $labor_detail->service->ref_to .' '. $labor_detail->service->unit .')';
				}else{
					$reference = '';
				}

				$class = '';
				if ($labor_detail->service->ref_from == '' || $labor_detail->service->ref_to == '') {

					if ($labor_detail->result== 'Positive' || $labor_detail->result== 'Positive' || $labor_detail->result== 'Positive') {
						$class = 'color_red';
					}

				}else{

					if ($labor_detail->result < $labor_detail->service->ref_from) {
						$class = 'color_green';
					}else if ($labor_detail->result > $labor_detail->service->ref_to) {
						$class = 'color_red';
					}

				}

				if ($labor_detail->name == 'Helicobacter pylori' || $labor_detail->name == 'BP' || $labor_detail->name == 'PR' || $labor_detail->name == 'SP02') {
					$bio_bottom .= '<tr>
														<td width="35%" style="padding: 6px 0.5cm 6px 0;"> '. $labor_detail->name .' : <span class="'. $class .'">'. $labor_detail->result .'</span> '. (($labor_detail->service->unit=='Negative')? '' : $labor_detail->service->unit.' ' ) . $reference .'</td>
													</tr>';
				}else{
					$bio .= '<tr>
										<td width="35%" style="padding: 6px 0 6px 0.5cm;">- '. $labor_detail->name .'</td>
										<td width="20%" class="'. $class .'">: '. $labor_detail->result .'</td>
										<td width="15%">'. (($labor_detail->service->unit=='Negative')? '' : $labor_detail->service->unit.' ' ) .'</td>
										<td width="30%">'. $reference .'</td>
									</tr>';
				}

			}
			
			$labor_detail_item_list = '<div style="padding: 0 1.3cm;">
																	<table width="100%">
																		<tr>
																			<td colspan="4"> <b style="text-decoration:underline;">BIO-CHIMIE</b></td>
																		</tr>
																		'. $bio .'
																	</table>	
																</div>
																<br/>
																<br/>
																<br/>
																<div style="padding: 0 0.8cm;">
																	<table width="100%">
																		'. $bio_bottom .'
																	</table>	
																</div>';

		}else if ($labor->type == 'serologie') {
			$serologie ='';
			$transaminase ='';
			foreach ($labor->labor_details as $jey => $labor_detail) {
				$reference = $labor_detail->service->ref_from .'-'.  $labor_detail->service->ref_to;
				
				$reference = '';
				if ($labor_detail->service->ref_from == '' && $labor_detail->service->ref_to != '') {
					$reference = '('. $labor_detail->service->description .' <'. $labor_detail->service->ref_to .' '. $labor_detail->service->unit .')';
				}else if($labor_detail->service->ref_from != '' && $labor_detail->service->ref_to ==''){
					$reference = '('. $labor_detail->service->description .' '. $labor_detail->service->ref_from .'> '. $labor_detail->service->unit .')';
				}else if($labor_detail->service->ref_from != '' && $labor_detail->service->ref_to!=''){
					$reference = '('. $labor_detail->service->description .' '. $labor_detail->service->ref_from .'-'. $labor_detail->service->ref_to .' '. $labor_detail->service->unit .')';
				}else{
					$reference = '';
				}

				$class = '';
				if ($labor_detail->service->ref_from == '' || $labor_detail->service->ref_to == '') {

					if ($labor_detail->result== 'Positive' || $labor_detail->result== 'Positive' || $labor_detail->result== 'Positive') {
						$class = 'color_red';
					}

				}else{

					if ($labor_detail->result < $labor_detail->service->ref_from) {
						$class = 'color_green';
					}else if ($labor_detail->result > $labor_detail->service->ref_to) {
						$class = 'color_red';
					}

				}

				if ($labor_detail->service->category->name == 'SEROLOGIE') {
					$serologie .= '<tr>
										<td width="25%" style="padding: 6px 0 6px 0.5cm;">- '. $labor_detail->name .'</td>
										<td width="20%" class="'. $class .'">: '. $labor_detail->result .'</td>
										<td width="15%">'. (($labor_detail->service->unit=='Negative')? '' : $labor_detail->service->unit.' ' ) .'</td>
										<td width="40%">'. $reference .'</td>
									</tr>';
				}else{
					$transaminase .= '<tr>
										<td width="25%" style="padding: 6px 0 6px 0.5cm;">- '. $labor_detail->name .'</td>
										<td width="20%" class="'. $class .'">: '. $labor_detail->result .'</td>
										<td width="15%">'. (($labor_detail->service->unit=='Negative')? '' : $labor_detail->service->unit.' ' ) .'</td>
										<td width="40%">'. $reference .'</td>
									</tr>';
				}

			}
			
			$labor_detail_item_list = '<div style="padding: 0 1.3cm;">
																	<table width="100%">
																		<tr>
																			<td colspan="4"> <b style="text-decoration:underline;">SEROLOGIE</b></td>
																		</tr>
																		'. $serologie .'
																		<tr>
																			<td colspan="4" style="padding-top: 20px;"> <b style="text-decoration:underline;">TRANSAMINASE</b></td>
																		</tr>
																		'. $transaminase .'
																	</table>	
																</div>';
		
		}else if ($labor->type == 'urine') {
			$urine ='';
			foreach ($labor->labor_details as $jey => $labor_detail) {
				
				$class = '';
				$result = (($labor_detail->result==null)? '' : $labor_detail->result);
				if (str_contains($result, '+') || $result == '7.5' || $result == '1.010') {
					$class = 'color_red';
				}

				$urine .= '<tr>
										<td width="13%" style="padding: 6px 0 6px 0.5cm;">- '. $labor_detail->name .'</td>
										<td>: ( <span class="'. $class .'">'. $labor_detail->result .'</span> )</td>
									</tr>';
			}
			
			$labor_detail_item_list = '<div style="padding: 0 1.3cm;">
																	<table width="100%">
																		<tr>
																			<td colspan="4"> <b style="text-decoration:underline;">URINE</b></td>
																		</tr>
																		'. $urine .'
																	</table>	
																</div>';
		
		}else if ($labor->type == 'test-labor') {
			$labor_items ='';
			$labor_to_th ='';
			$labor_glycemie ='';
			foreach ($labor->labor_details as $jey => $labor_detail) {
				$reference = $labor_detail->service->ref_from .'-'.  $labor_detail->service->ref_to;
				if ($labor_detail->service->name == 'TO') {
				
					$labor_to_th .= '<tr>
														<td width="25%">▢ Séro-Ag-de Widal</td>
														<td colspan="3">: &nbsp;&nbsp; - '. $labor_detail->name .' : '. $labor_detail->result .'</td>
													</tr>';

				}elseif ($labor_detail->service->name == 'TH') {
					$labor_to_th .= '<tr>
														<td width="25%"></td>
														<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp; - '. $labor_detail->name .' : '. $labor_detail->result .'</td>
													</tr>';
				}elseif ($labor_detail->service->name == '▢ Glycémie' || $labor_detail->service->name == '▢ Test H-Pylori') {
					$reference = '';
					if ($labor_detail->service->ref_from == '' && $labor_detail->service->ref_to != '') {
						$reference = '('. $labor_detail->service->description .' <'. $labor_detail->service->ref_to .' '. $labor_detail->service->unit .')';
					}else if($labor_detail->service->ref_from != '' && $labor_detail->service->ref_to ==''){
						$reference = '('. $labor_detail->service->description .' '. $labor_detail->service->ref_from .'> '. $labor_detail->service->unit .')';
					}else if($labor_detail->service->ref_from != '' && $labor_detail->service->ref_to!=''){
						$reference = '('. $labor_detail->service->description .' '. $labor_detail->service->ref_from .'-'. $labor_detail->service->ref_to .' '. $labor_detail->service->unit .')';
					}else{
						$reference = '';
					}

					$class = '';
					if ($labor_detail->service->ref_to=='' || $labor_detail->service->ref_from=='') {
						$class = '';
					}elseif ($labor_detail->result < $labor_detail->service->ref_from) {
						$class = 'color_green';
					}else if ($labor_detail->result > $labor_detail->service->ref_to) {
						$class = 'color_red';
					}
					if ($labor_detail->result== 'Positive' || $labor_detail->result== 'Positive' || $labor_detail->result== 'Positive') {
						$class = 'color_red';
					}
					$labor_glycemie .= '<tr>
						<td width="25%">'. $labor_detail->name .'</td>
						<td width="25%" class="'. $class .'">: '. $labor_detail->result .'</td>
						<td width="25%">'. (($labor_detail->service->unit=='Negative')? '' : $labor_detail->service->unit.' ' ) .'</td>
						<td width="25%">'. $reference .'</td>
					</tr>';
				}else{
					$class = '';
					if ($labor_detail->result < $labor_detail->service->ref_from) {
						$class = 'color_green';
					}else if ($labor_detail->result > $labor_detail->service->ref_to) {
						$class = 'color_red';
					}
					
					$labor_items .= '<tr>
						<td width="25%">'. $labor_detail->name .'</td>
						<td width="10%" class="'. $class .' text-right">'. $labor_detail->result .'</td>
						<td width="12%" class=""></td>
						<td width="25%" class="">'. $labor_detail->service->unit .'</td>
						<td width="">('. $labor_detail->service->ref_from .' - '. $labor_detail->service->ref_to .')</td>
					</tr>';
				}
			}
			
			$labor_detail_item_list = '<div style="padding: 0 1.3cm;">
																	<table width="100%" class="test_labor">
																		<tr>
																			<td colspan="4"></td>
																			<td>Ranges</td>
																		</tr>
																		'. $labor_items .'
																	</table>
																	<br/>
																	<br/>
																	<table width="100%" class="test_labor_glycemie">
																		'. $labor_glycemie .'
																		'. $labor_to_th .'
																	</table>	
																</div>';
		}else if ($labor->type == 'blood-test') {
			$labor_items = '';
			$HEMATOLOGY = '';
			$BIOCHEMISTRY = '';
			$SEROLOGY = '';
			$MICROBIOLOGY = '';
			foreach ($labor->labor_detail_bt as $jey => $labor_detail) {
				$category_name = $labor_detail->service->category->name;
				$labor_service_description = $category_name == 'BIOCHEMISTRY' ? '' : $labor_detail->service->description . ' ';
				$labor_service_ref_from = $labor_detail->service->ref_from;
				$labor_service_ref_to = $labor_detail->service->ref_to;
				$labor_service_ref_to = $category_name == 'BIOCHEMISTRY' && $labor_service_ref_to < 10 ? number_format($labor_service_ref_to, 1) : $labor_service_ref_to;

				$reference = '';
				// if ($labor_service_ref_from == '' && $labor_service_ref_to != '') {
				// 	$reference = '('. $labor_service_description .' <'. $labor_service_ref_to .' '. $labor_detail->service->unit .')';
				// }else if($labor_service_ref_from != '' && $labor_service_ref_to ==''){
				// 	$reference = '('. $labor_service_description .' '. $labor_service_ref_from .'> '. $labor_detail->service->unit .')';
				// }else 
				if($labor_service_ref_from != '' && $labor_service_ref_to!=''){
					$reference = '('. $labor_service_description .''. $labor_service_ref_from .' - '. $labor_service_ref_to .')';
					// $reference = '('. $labor_service_description .' '. $labor_service_ref_from .' - '. $labor_service_ref_to .' '. $labor_detail->service->unit .')';
				}

				$class = '';
				if ($labor_service_ref_from == '' || $labor_service_ref_to == '') {
					if ($labor_service_ref_from != '' && $labor_detail->result < $labor_service_ref_from) {
						$class = 'color_green';
					}else if ($labor_service_ref_to != '' && $labor_detail->result > $labor_service_ref_to) {
						$class = 'color_red';
					}

					if ($labor_detail->result== 'Positive' || $labor_detail->result== 'Positive' || $labor_detail->result== 'Positive') {
						$class = 'color_red';
					}
				}else{
					if ($labor_detail->result < $labor_service_ref_from) {
						$class = 'color_green';
					}else if ($labor_detail->result > $labor_service_ref_to) {
						$class = 'color_red';
					}
				}

				if ($category_name == 'HEMATOLOGY') {
					$servicen='hello';
						if($labor_detail->name == 'Neutrophils (%)'){$servicen='80%';}
						else if($labor_detail->name == 'Lymphocytes (%)'){$servicen='15%';}
						else if($labor_detail->name == 'Monophocytes (%)'){$servicen='03%';}
						else if($labor_detail->name == 'Eosinophils (%)'){$servicen='02%';}
						else if($labor_detail->name == 'Basophils (%)'){$servicen='00%';}
						else {$servicen='';}
						$thto='';
						if($labor_detail->result=='1/160'){$thto='<span style="color: red;">Negative</span>';}
						else if($labor_detail->result=='1/320'){$thto='<span style="color: red;">Negative</span>';}
						else{$thto='';}
					
					$HEMATOLOGY .= $this->subService($labor_detail->service->labor_service)
									.'<tr>
										<td><div class="'. $labor_detail->service->class .'">'. $labor_detail->name .'</div></td>
										<td class="'. $class .'">'.$servicen.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $labor_detail->result .'</td>
										<td>'. (($labor_detail->unit=='Negative')? '' : $labor_detail->unit) .'</td>
										<td>'. $reference .'</td>
									</tr>';
				}else if ($category_name == 'BIOCHEMISTRY') {
					$BIOCHEMISTRY .= $this->subService($labor_detail->service->labor_service)
									.'<tr>
										<td><div class="'. $labor_detail->service->class .'">'. $labor_detail->name .'</div></td>
										<td class="'. $class .'">' . (strpos($labor_detail->service->name, "___") ? '<span style="display: inline-block; width: 60px"> ' . explode('___', $labor_detail->service->name)[1] . ' </span>' : '' ) . $labor_detail->result .'</td>
										<td>'. (($labor_detail->unit=='Negative')? '' : $labor_detail->unit) .'</td>
										<td>'. $reference .'</td>
									</tr>';
				}else if ($category_name == 'SEROLOGY') {
					$SEROLOGY .= $this->subService($labor_detail->service->labor_service)
								.'<tr>
									<td><div class="'. $labor_detail->service->class .'">'. $labor_detail->name .'</div></td>
									<td class="'. (($labor_detail->result=='1/160' || $labor_detail->result=='1/320')? 'color_red' : $class ) .'">'. $labor_detail->result .'</td>
									<td></td>
									<td>'. $reference .'</td>
								</tr>';
				}else if ($category_name == 'MICROBIOLOGY') {
					$MICROBIOLOGY .= $this->subService($labor_detail->service->labor_service)
									.'<tr>
										<td><div class="'. $labor_detail->service->class .'">'. $labor_detail->name .'</div></td>
										<td class="'. (($labor_detail->result<>$labor_detail->service->default_value)? 'color_red' : $class ) .'">'. $labor_detail->result .'</td>
										<td>'. (($labor_detail->unit=='Negative')? '' : $labor_detail->unit) .'</td>
										<td>'. $reference .'</td>
									</tr>';
				}
			}
			
			if ($HEMATOLOGY != '') {
				$labor_items .= '<tr>
									<td colspan="4"><h6 style="padding: 3px 15px; margin: 10px 0px 2px 0px; font-size: 16px; background-color: lightblue!important;"><strong>HEMATOLOGY</strong></h6></td>
								</tr>' . $HEMATOLOGY;
			}
			if ($BIOCHEMISTRY != '') {
				$labor_items .= '<tr>
									<td colspan="4"><h6 style="padding: 3px 15px; margin: 10px 0px 2px 0px; font-size: 16px; background-color: lightblue!important;"><strong>BIOCHEMISTRY</strong></h6></td>
								</tr>' . $BIOCHEMISTRY;
			}
			if ($SEROLOGY != '') {
				$labor_items .= '<tr>
									<td colspan="4"><h6 style="padding: 3px 15px; margin: 10px 0px 2px 0px; font-size: 16px; background-color: lightblue!important;"><strong>SEROLOGY</strong></h6></td>
								</tr>' . $SEROLOGY;
			}
			if ($MICROBIOLOGY != '') {
				$labor_items .= '<tr>
									<td colspan="4"><h6 style="padding: 3px 15px; margin: 10px 0px 2px 0px; font-size: 16px; background-color: lightblue!important;"><strong>MICROBIOLOGY</strong></h6></td>
								</tr>' . $MICROBIOLOGY;
			}
			$labor_detail_item_list = '<table style="margin-top: -25px; margin-left: 55px; width: calc(100% - 55px)">
											<thead>
												<tr>
													<th width="40%" style="pading: 0 !important;"></th>
													<th width="20%" style="pading: 0 !important;"></th>
													<th width="10%" style="pading: 0 !important;"></th>
													<th width="30%" style="pading: 0 !important;"></th>
												</tr>
											</thead>
											<tbody>
												'. $labor_items .'
											</tbody>
										</table>';
		}

		$labor_detail = '<section class="'. (($labor->type == 'blood-test')? 'blood-test labor-print' : 'labor-print') .'" style="position: relative;">
			<header>' . $GlobalComponent->PrintHeader('labor', $labor) . '</header>
			
			'. $labor_detail_item_list .'
			<small class="remark">'. $labor->remark .'</small>
			
			<footer>
				' . $GlobalComponent->FooterComeBackText('<span class="color_red;" style="color: red;				
				">សូមយកលទ្ធផលពិនិត្យឈាមនេះមកវិញពេលមកពិនិត្យលើកក្រោយ</span>') . '
				<table width="100%">
					<tr>
						<td></td>
						<td width="28%" class="text-center">
							' . $GlobalComponent->DoctorSignature() . '
						</td>
					</tr>
				</table>
			</footer>
		</section>';

		return response()->json(['labor_detail' => $labor_detail, 'title' => $title]);
	}

	public function labor_number()
	{
		$labor = Labor::whereYear('date', date('Y'))->orderBy('labor_number', 'desc')->first();
		return (($labor === null) ? '000001' : $labor->labor_number + 1);
	}

	public function create($request, $type)
	{
		$request->patient_id = GlobalComponent::GetPatientIdOrCreate($request);
		$labor = Labor::create(GlobalComponent::MergeRequestPatient($request, [
			'date' => $request->date,
			'labor_number' => $request->labor_number,
			'price' => $request->price ?: 0,
			'type' => $type,
			'labor_type' => $request->labor_type ?: 1,
			'simple_labor_detail' => $request->simple_labor_detail ?: '',
			'remark' => $request->remark,
			'created_by' => Auth::user()->id,
			'updated_by' => Auth::user()->id,
		]));
		
		if ($type = 'blood-test') {
			if (isset($request->service_id)) {
				$services = LaborService::whereIn('id', $request->service_id)->get();
				foreach ($services as $i => $service) {
					LaborDetail::create([
						'name' => $service->name,
						'result' => $request->result[$i],
						'unit' => $service->unit,
						'service_id' => $service->id,
						'labor_id' => $labor->id,
						'created_by' => Auth::user()->id,
						'updated_by' => Auth::user()->id,
					]);
				}
			}
		}else{
			if (isset($request->service_name) && isset($request->service_id)) {
				for ($i = 0; $i < count($request->service_name); $i++) {
					LaborDetail::create([
						'name' => $request->service_name[$i],
						'result' => $request->result[$i],
						'unit' => $request->unit[$i],
						'service_id' => $request->service_id[$i],
						'labor_id' => $labor->id,
						'created_by' => Auth::user()->id,
						'updated_by' => Auth::user()->id,
					]);
				}
			}
		}
		return $labor;
	}

	public function update($request, $type, $labor)
	{
		$labor->update(GlobalComponent::MergeRequestPatient($request, [
			'date' => $request->date,
			'price' => $request->price ?: 0,
			'type' => $type,
			'simple_labor_detail' => $request->simple_labor_detail ?: '',
			'remark' => $request->remark,
			'updated_by' => Auth::user()->id,
		]));

		if ($type = 'blood-test') {
			if (isset($request->labor_detail_ids)) {
				for ($i = 0; $i < count($request->labor_detail_ids); $i++) {
					$labor_detail = LaborDetail::find($request->labor_detail_ids[$i]);
					$service = LaborService::find($labor_detail->service_id);
					$labor_detail->update([
						'result' => $request->labor_detail_result[$i],
						'unit' => $service->unit,
						'updated_by' => Auth::user()->id,
					]);
				}
			}
			if ($request->labor_detail_ids!=null) {
				$delete_labor_detail_ids = array_diff($labor->labor_details()->pluck('id')->toArray(), array_map('intval', $request->labor_detail_ids));
				LaborDetail::whereIn('id', $delete_labor_detail_ids)->delete();
			}

			if (isset($request->service_ids)) {
				$services = LaborService::whereIn('id', $request->service_ids)->get();
				foreach ($services as $i => $service) {
					LaborDetail::create([
						'name' => $service->name,
						'result' => $request->service_result[$i],
						'unit' => $service->unit,
						'service_id' => $service->id,
						'labor_id' => $labor->id,
						'created_by' => Auth::user()->id,
						'updated_by' => Auth::user()->id,
					]);
				}
			}

		} else {
			if (isset($request->labor_detail_ids)) {
				for ($i = 0; $i < count($request->labor_detail_ids); $i++) {
					LaborDetail::find($request->labor_detail_ids[$i])->update([
						'result' => $request->result[$i],
						'unit' => $request->unit[$i],
						'updated_by' => Auth::user()->id,
					]);
				}
			}
		}
		
		return $labor;
	}

	public function destroy($request, $labor)
	{
		if (Hash::check($request->passwordDelete, Auth::user()->password)) {
			$labor_number = $labor->labor_number;
			if ($labor->delete()) {
				return $labor_number;
			}
		} else {
			return false;
		}
	}

	public function deleteLaborDetail($request)
	{
		$labor_detail = LaborDetail::find($request->id);
		$labor_id = $labor_detail->labor_id;
		$labor_detail->delete();

		$json = $this->getLaborPreview($labor_id)->getData();

		$labor = Labor::find($labor_id);
		$labor_detail_list = '';
		foreach ($labor->labor_details as $order => $labor_detail) {
			$labor_detail_list .= '<tr class="labor_item" id="'. $labor_detail->result .'">
																<td class="text-center">'. ++$order .'</td>
																<td>
																	<input type="hidden" name="labor_detail_ids[]" value="'. $labor_detail->id .'">
																	'. $labor_detail->name .'
																</td>
																<td class="text-center">
																	<input type="text" name="result[]" value="'. $labor_detail->result .'" class="form-control"/>
																</td>
																<td class="text-center">
																	'. $labor_detail->service->unit .'
																</td>
																<td class="text-center">
																	'. $labor_detail->service->ref_from .' - '. $labor_detail->service->ref_from .'
																</td>
																<td class="text-center">
																	<button type="button" onclick="deleteLaborDetail(\''. $labor_detail->id .'\')" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash-alt"></i></button>
																</td>
															</tr>';
			}

		return response()->json([
			'success'=>'success',
			'labor_preview' => $json->labor_detail,
			'labor_detail_list' => $this->getLaborDetail($labor_id),
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
