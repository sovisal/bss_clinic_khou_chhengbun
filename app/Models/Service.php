<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Service extends BaseModel
{


	protected $table = 'services';

	protected $fillable = [
		'name','quantity', 'price', 'description', 'created_by', 'updated_by',
	];


	public static function getSelectService($id = [])
	{
		$collection = parent::orderBy('name', 'asc')->orWhereIn('id', $id)->get();
		$items = [];
		foreach ($collection as $model) {
				$items[$model->id] = $model->name;
		}
		return $items;
	}


}
