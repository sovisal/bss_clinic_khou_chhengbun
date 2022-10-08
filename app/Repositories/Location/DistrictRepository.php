<?php

namespace App\Repositories\Location;

use Carbon\Carbon;
use App\Models\District;


class DistrictRepository
{


	public function getData()
	{
		return District::orderBy('province_id','asc')->get();
	}


	public function create($request)
	{

		$district = District::create(
			request(['name','name_en','code','province_id'])
		);

		return true;
	}


	public function update($request, $district)
	{

		return $district->update(request(['name','name_en','code','province_id']));

	}

	public function destroy($district)
	{

		$name = $district->name;
		if($district->delete()){
			return $name ;
		}

	}

}