<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class LaborService extends BaseModel
{


	protected $table = 'labor_services';

	protected $fillable = [
		'name', 'default_value', 'unit', 'ref_from', 'ref_to', 'description', 'class', 'sub_of', 'category_id', 'created_by', 'updated_by',
	];


	public static function getSelectService()
	{
		$collection = parent::whereIn('description', ['main','sub'])->orderBy('category_id', 'asc')->get();
		$items = [];
		foreach ($collection as $model) {
				$items[$model->id] = $model->category->name .' :: '. $model->name;
		}
		return $items;
	}

	public function labor_service(){
		return $this->belongsTo(LaborService::class,'sub_of');
	}
  
	public function category(){
		return $this->belongsTo(LaborCategory::class,'category_id');
	}


}
