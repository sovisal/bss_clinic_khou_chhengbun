<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use App\Models\LaborDetail;

class Labor extends Model
{
	protected $fillable = [
		'date',
		'labor_number',
		'rate',
		'pt_no',
		'pt_age',
		'pt_age_type',
		'pt_name',
		'pt_gender',
		'pt_phone',
		'pt_address_code',
		'pt_address_full_text',
		'status',
		'price',
		'type',
		'labor_type',
		'simple_labor_detail',
		'remark',
		'patient_id',
		'created_by',
		'updated_by',
	];

	protected $table = 'labors';
	
	public function labor_details(){
		return $this->hasMany(LaborDetail::class,'labor_id')->orderBy('id','asc');
	}
	
	public function labor_detail_bt(){
		return $this->hasMany(LaborDetail::class,'labor_id')->orderBy('service_id', 'asc');
	}

	public function labor_detail_sub_total(){
		$labors = $this->hasMany(LaborDetail::class,'labor_id')->get();
		$total = 0;
		foreach ($labors as $key => $labor) {
			$total += ($labor->amount);
		}
		return $total;
	}

  public function patient()
  {
  	return $this->belongsTo(Patient::class, 'patient_id');
	}

}
