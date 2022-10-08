<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\LaborCategory;
use Auth;


class LaborCategoryRepository
{


	public function getData()
	{
		return LaborCategory::all();
	}

	public function create($request)
	{

		$labor_category = LaborCategory::create([
			'name' => $request->name,
			'description' => $request->description,
			'created_by' => Auth::user()->id,
			'updated_by' => Auth::user()->id,
		]);

		return $labor_category;
	}


	public function update($request, $labor_category)
	{

		return $labor_category->update([
			'name' => $request->name,
			'description' => $request->description,
			'created_by' => Auth::user()->id,
			'updated_by' => Auth::user()->id,
		]);

	}

	public function destroy($labor_category)
	{

		$name = $labor_category->name;
		if($labor_category->delete()){
			return $name ;
		}

	}

}