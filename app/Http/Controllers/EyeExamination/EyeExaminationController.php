<?php

namespace App\Http\Controllers\EyeExamination;

use App\Models\Patient;
use App\Models\Service;
use App\Models\Medicine;
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
	protected $path;

	public function __construct(EyeExaminationRepository $repository)
	{
		$this->eye_examination = $repository;
		$this->path = public_path('images/eye_examinations/');
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
			'patients' => Patient::getSelectData('id', 'name', '', 'name', 'asc'),
			'eye_sign_range' => [
				'' => '----- Please Select -----',
				'6/120' => '6/120',
				'6/60' => '6/60',
				'6/36' => '6/36',
				'6/24' => '6/24',
				'6/18' => '6/18',
				'6/15' => '6/15',
				'6/12' => '6/12',
				'6/9' => '6/9',
				'6/7.5' => '6/7.5',
				'6/6' => '6/6',
				'6/5' => '6/5'
			],
		];
		return view('eye_examination.create', $this->data);
	}

	public function store(EyeExaminationRequest $request)
	{
		$eye_examination = $this->eye_examination->create($request, $this->path);
		if ($eye_examination) {
			// Redirect
			return redirect()->route('eye_examination.edit', $eye_examination->id)
				->with('success', __('alert.crud.success.create', ['name' => Auth::user()->module()]) . $request->date);
		}
	}

	// public function show(EyeExamination $eye_examination)
	// {
	// 	//
	// }

	public function getEyeExaminationPreview(Request $request)
	{
		return $this->eye_examination->getEyeExaminationPreview($request->id);
	}


	public function edit(EyeExamination $eye_examination)
	{
		$this->data = [
			'eye_examination' => $eye_examination,
			'medicines' => Medicine::getSelectData('id', 'name', '', 'name', 'asc'),
			'services' => Service::select('id', 'name', 'quantity', 'price', 'description')->orderBy('name', 'asc')->get(),
			'patients' => Patient::getSelectData('id', 'name', '', 'name', 'asc'),
			'eye_sign_range' => [
				'' => '----- Please Select -----',
				'6/120' => '6/120',
				'6/60' => '6/60',
				'6/36' => '6/36',
				'6/24' => '6/24',
				'6/18' => '6/18',
				'6/15' => '6/15',
				'6/12' => '6/12',
				'6/9' => '6/9',
				'6/7.5' => '6/7.5',
				'6/6' => '6/6',
				'6/5' => '6/5'
			],
			'eye_examination_preview' => $this->eye_examination->getEyeExaminationPreview($eye_examination->id, $this->path)->getData()->eye_examination_detail,
		];

		return view('eye_examination.edit', $this->data);
	}

	public function print(EyeExamination $eye_examination)
	{
		$this->data = [
			'eye_examination' => $eye_examination,
			'eye_examination_preview' => $this->eye_examination->getEyeExaminationPreview($eye_examination->id, $this->path)->getData()->eye_examination_detail,
		];

		return view('eye_examination.print', $this->data);
	}

	public function update(EyeExaminationRequest $request, EyeExamination $eye_examination)
	{
		if ($this->eye_examination->update($request, $eye_examination, $this->path)) {

			// Redirect
			return redirect()->route('eye_examination.edit', $eye_examination->id)
				->with('success', __('alert.crud.success.update', ['name' => Auth::user()->module()]) . str_pad($request->inv_number, 6, "0", STR_PAD_LEFT));
		}
	}

	public function destroy(Request $request, EyeExamination $eye_examination)
	{
		// Redirect
		return redirect()->route('eye_examination.index')
			->with('success', __('alert.crud.success.delete', ['name' => Auth::user()->module()]) . str_pad(($this->eye_examination->destroy($request, $eye_examination, $this->path)), 6, "0", STR_PAD_LEFT));
	}
}
