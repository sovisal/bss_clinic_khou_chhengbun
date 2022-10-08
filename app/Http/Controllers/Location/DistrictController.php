<?php

namespace App\Http\Controllers\Location;

use App\Models\Province;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Repositories\Location\DistrictRepository;
use Auth;

class DistrictController extends Controller
{


	protected $districts;

	public function __construct(DistrictRepository $repository)
	{
		$this->districts = $repository;
	}

	public function index()
	{
		$this->data = [
				'districts' => $this->districts->getData(),
		];

		return view('district.index', $this->data);
	}


	public function create()
	{
		$this->data = [
				'provinces' => Province::getSelectData('id', 'name', 'name_en', 'name' ,'asc'),
		];

		return view('district.create', $this->data);
	}


	public function store(DistrictRequest $request)
	{

		if ($this->districts->create($request)){

			// Redirect
			return redirect()->route('district.create')
				->with('success', __('alert.crud.success.create', ['name' => Auth::user()->module()]) . $request->name);
		}
	}

	public function edit(District $district)
	{
		$this->data = [
				'provinces' => Province::getSelectData(),
				'district' => $district,
		];
		
		return view('district.edit', $this->data);
	}


	public function update(DistrictRequest $request, District $district)
	{

		if ($this->districts->update($request, $district)){

			// Redirect
			return redirect()->route('district.index')
				->with('success', __('alert.crud.success.update', ['name' => Auth::user()->module()]) . $request->name);
		}
	}


	public function destroy(District $district)
	{
		// Redirect
		return redirect()->route('district.index')
			->with('success', __('alert.crud.success.delete', ['name' => Auth::user()->module()]) . $this->districts->destroy($district));
	}

}
