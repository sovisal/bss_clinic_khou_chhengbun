<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Medicine extends BaseModel
{


	protected $table = 'medicines';

	protected $fillable = [
		'name', 'price', 'code', 'usage_id', 'description', 'created_by', 'updated_by',
	];



	public function usage(){
		return $this->belongsTo(Usage::class,'usage_id');
	}

}
