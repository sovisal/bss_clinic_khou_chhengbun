<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Province extends BaseModel
{

	
  public function getSelectDistrict()
  {
  	$collection = $this->districts;

		$items = [];
		foreach ($collection as $model) {
			$items[$model->id] = $model->name .' :: '. $model->name_en;
		}

		return $items;

	}
	


  public function districts()
  {
  	return $this->hasMany(District::class, 'province_id');

  }

	protected $table = 'provinces';

	protected $fillable = [
		'name_en', 'name',
	];




}
