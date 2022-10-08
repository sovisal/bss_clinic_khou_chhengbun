<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceDetail;

class Invoice extends Model
{
	protected $fillable = [
		'date',
		'inv_number',
		'rate',
		'pt_no',
		'pt_age',
		'pt_age_type',
		'pt_name',
		'pt_gender',
		'pt_phone',
		'pt_address_code',
		'pt_address_full_text',
		'pt_diagnosis',
		'status',
		'remark',
		'patient_id',
		'created_by',
		'updated_by',
	];

	protected $table = 'invoices';
	
	public function invoice_details(){
		return $this->hasMany(InvoiceDetail::class,'invoice_id')->orderBy('index',
		'asc');
	}

	public function invoice_detail_sub_total(){
		$invoices = $this->hasMany(InvoiceDetail::class,'invoice_id')->get();
		$total = 0;
		foreach ($invoices as $key => $invoice) {
			$total += ($invoice->amount);
		}

		return $total;
	}

	public function invoice_discount_total(){
		$invoices = $this->hasMany(InvoiceDetail::class,'invoice_id')->get();
		$total = 0;
		foreach ($invoices as $key => $invoice) {
			$total += ($invoice->amount) * $invoice->discount;
		}

		return $total;
	}

	public function invoice_detail_grand_total(){
		$invoices = $this->hasMany(InvoiceDetail::class,'invoice_id')->get();
		$total = 0;
		foreach ($invoices as $key => $invoice) {
			$total += ($invoice->amount) - ($invoice->amount * $invoice->discount);
		}

		return $total;
	}

  public function patient()
  {
  	return $this->belongsTo(Patient::class, 'patient_id');
	}

}
