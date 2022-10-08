<?php

namespace App\Models;

use App\Models\Province;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class District extends BaseModel
{

  public function province()
  {
  	return $this->belongsTo(Province::class, 'province_id');
	}
	
	protected $table = 'districts';

	protected $fillable = [
		'name_en', 'name', 'code', 'province_id'
	];


}
