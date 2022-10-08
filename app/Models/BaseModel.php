<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

	public static function sortIndex()
	{
			$row = parent::orderBy('sort', 'desc')->first();
			$sort = ((isset($row->sort))? $row->sort + 1 : 1);
			return $sort;
	}

	
	public static function getSelectData($key = 'id', $value_1 = 'name', $value_2 = 'name_en', $order_field = 'name', $order = 'asc')
	{
		$collection = parent::orderBy($order_field, $order)->get();

		$items = [];

		if ($value_2 != '') {
			foreach ($collection as $model) {
				$items[$model->$key] = $model->$value_1 .' :: '. $model->$value_2;
			}
		}else{
			foreach ($collection as $model) {
				$items[$model->$key] = $model->$value_1;
			}
		}

		return $items;
	}

}
