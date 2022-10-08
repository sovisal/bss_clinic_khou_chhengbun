<?php

namespace App\Repositories\Location;

use Carbon\Carbon;
use App\Models\Province;


class ProvinceRepository
{


	public function getData()
	{
		return Province::all();
	}


	public function getSelectDistrict($request)
	{

		$option = '<option value="">'. __('label.form.choose') .'</option>';
		$province = Province::find($request->id);
		
		foreach ($province->districts as $key => $district) {
			$option .= '<option value="'. $district->id .'">'. $district->name .'::'. $district->name_en .'</option>';
		}

		return $option;
	}
	
	public function create($request)
	{

		$province = Province::create(
			request(['name','name_en'])
		);

		return true;
	}


	public function update($request, $province)
	{

		return $province->update(request(['name','name_en']));

	}

	public function destroy($province)
	{

		$name = $province->name;
		if($province->delete()){
			return $name ;
		}

	}

}