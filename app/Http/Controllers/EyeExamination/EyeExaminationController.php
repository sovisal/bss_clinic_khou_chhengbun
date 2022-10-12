<?php

namespace App\Http\Controllers\EyeExamination;

use App\Models\Patient;
use App\Models\Service;
use App\Models\District;
use App\Models\Medicine;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\EyeExamination;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EyeExaminationRequest;
use App\Repositories\EyeExaminationRepository;

class EyeExaminationController extends Controller
{
	
	protected $eye_examination;

	public function __construct(EyeExaminationRepository $repository)
	{
		$this->eye_examination = $repository;
	}

	public function getDatatable(Request $request)
	{
		return $this->eye_examination->getDatatable($request);
	}

	public function index()
	{
		return view('eye_examination.index');
	}

	public function create()
	{
		$this->data = [
			'patients' => Patient::getSelectData('id', 'name', '', 'name' ,'asc'),
		];
		return view('eye_examination.create', $this->data);
	}

	public function store(EyeExaminationRequest $request)
	{
		// Define Upload Image Path
		$path = public_path().'/images/echoes/';

		if ($request->file('image')) {
			$validator = Validator::make($request->all(), [
				'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
			]);
			if ($validator->fails()) {
				// Redirect Back
				return back()->withErrors($validator)->withInput();
			}
		}
		$eye_examination = $this->eye_examination->create($request, $path);
		if ($eye_examination) {
			// Redirect
			return redirect()->route('eye_examination.edit', $eye_examination->id)
				->with('success', __('alert.crud.success.create', ['name' => Auth::user()->module()]) . $request->date);
		}
	}

	public function show(EyeExamination $eye_examination)
	{
		//
	}

	public function getEyeExaminationPreview(Request $request)
	{
		return $this->eye_examination->getEyeExaminationPreview($request->id);
	}

	public function eye_examination_detail(EyeExamination $eye_examination)
	{
		$this->data = [
			'eye_examination' => $eye_examination,
			'services' => Service::getSelectService($eye_examination->service_id),
			'eye_examination_preview' => $this->eye_examination->getEyeExaminationPreview($eye_examination->id),
		];

		return view('eye_examination.eye_examination_detail', $this->data);
	}


	public function edit(EyeExamination $eye_examination)
	{

		$this->data = [
			'eye_examination' => $eye_examination,
			'medicines' => Medicine::getSelectData('id', 'name', '', 'name' ,'asc'),
			'services' => Service::select('id', 'name', 'quantity', 'price', 'description')->orderBy('name' ,'asc')->get(),
			'patients' => Patient::getSelectData('id', 'name', '', 'name' ,'asc'),
			'eye_examination_preview' => $this->eye_examination->getEyeExaminationPreview($eye_examination->id)->getData()->eye_examination_detail,
		];

		return view('eye_examination.edit', $this->data);
	}

	public function print(EyeExamination $eye_examination)
	{

		$this->data = [
			'eye_examination' => $eye_examination,
			'eye_examination_preview' => $this->eye_examination->getEyeExaminationPreview($eye_examination->id)->getData()->eye_examination_detail,
		];

		return view('eye_examination.print', $this->data);
	}

	public function update(EyeExaminationRequest $request, EyeExamination $eye_examination)
	{
		// if ($this->eye_examination->update($request, $eye_examination)) {

		// 	// Redirect
		// 	return redirect()->route('eye_examination.edit', $eye_examination->id)
		// 		->with('success', __('alert.crud.success.update', ['name' => Auth::user()->module()]) . str_pad($request->inv_number, 6, "0", STR_PAD_LEFT));
		// }
	}

	public function destroy(Request $request, EyeExamination $eye_examination)
	{
		// Redirect
		return redirect()->route('eye_examination.index')
			->with('success', __('alert.crud.success.delete', ['name' => Auth::user()->module()]) . str_pad(($this->eye_examination->destroy($request, $eye_examination)), 6, "0", STR_PAD_LEFT));
	}
}
