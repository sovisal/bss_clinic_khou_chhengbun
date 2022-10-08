<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Prescription;
use App\Models\Service;

class PrescriptionDetail extends Model
{
	protected $fillable = [
		'medicine_name', 'medicine_usage', 'morning', 'afternoon', 'evening', 'night', 'qty_days', 'description', 'index', 'prescription_id', 'medicine_id', 'created_by', 'updated_by',
	];

	protected $table = 'prescription_details';
	
	public function medicine(){
		return $this->belongsTo(Service::class,'medicine_id');
	}
	
	public function prescription(){
		return $this->belongsTo(Prescription::class,'prescription_id');
	}
}
