<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Doctor;
use App\Models\Province;
use App\Models\District;
use Auth;
use Hash;
use Validator;
use Artisan;

class DoctorController extends Controller
{
    
	protected $doctors;

	public function __construct(DoctorRepository $repository)
	{
			$this->doctors = $repository;
	}

	public function index()
	{

		$this->data = [
			'doctors' => $this->doctors->getData(),
		];

		return view('doctor.index', $this->data);
		
	}


	public function create()
	{
		$this->data = [
			'provinces' => Province::getSelectData(),
			'districts' => [],
		];

		return view('doctor.create', $this->data);
	}

	public function store(DoctorRequest $request)
	{
		if ($this->doctors->create($request)){
			// Redirect
			return redirect()->route('doctor.index')
					->with('success', __('alert.crud.success.create', ['name' => Auth::user()->module()]) . $request->name_kh);
		}
	}


	public function getDetail(Request $request)
	{
		return $this->doctors->getDetail($request);
	}

	public function edit(Doctor $doctor)
	{
		$this->data = [
			'provinces' => Province::getSelectData(),
			'districts' => (($doctor->address_district_id=='')? [] : $doctor->province->getSelectDistrict()),
			'doctor' => $doctor,
		];
		return view('doctor.edit', $this->data);
	}


	public function update(Request $request, Doctor $doctor)
	{
    if ($this->doctors->update($request, $doctor)){
			$this->middleware('can:Doctor Edit');
			// Redirect
			return redirect()->route('doctor.edit', $doctor->id)
					->with('success', __('alert.crud.success.update', ['name' => Auth::user()->module()]) . $request->name_kh);
    }
	}


	public function destroy(Request $request, Doctor $doctor)
	{
		// Redirect
		return redirect()->route('doctor.index')
				->with('success', __('alert.crud.success.delete', ['name' => Auth::user()->module()]) . $this->doctors->destroy($request, $doctor));
	}

}
