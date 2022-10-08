<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
use App\Models\Service;

class InvoiceDetail extends Model
{
	protected $fillable = [
		'name', 'quantity', 'amount', 'discount', 'description', 'index', 'invoice_id', 'service_id', 'created_by', 'updated_by',
	];

	protected $table = 'invoice_details';
	
	public function service(){
		return $this->belongsTo(Service::class,'service_id');
	}
	
	public function invoice(){
		return $this->belongsTo(Invoice::class,'invoice_id');
	}
}
