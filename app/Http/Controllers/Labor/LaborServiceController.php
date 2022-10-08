<?php

namespace App\Http\Controllers\Labor;

use App\Models\LaborService;
use App\Models\LaborCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LaborServiceRequest;
use App\Repositories\LaborServiceRepository;
use Auth;

class LaborServiceController extends Controller
{

	protected $labor_services;

	public function __construct(LaborServiceRepository $repository)
	{
		$this->labor_services = $repository;
	}

	public function index()
	{
		$this->data = [
				'labor_services' => $this->labor_services->getData(),
		];

		return view('labor_service.index', $this->data);
	}

	public function getDetail(Request $request)
	{
		return $this->labor_services->getDetail($request);
	}

	public function reloadSelectLaborService()
	{
		return $this->labor_services->reloadSelectLaborService();
	}


	public function create()
	{
		$this->data = [
			'labor_services' => LaborService::getSelectService(),
			'categories' => LaborCategory::getSelectData('id', 'name', '', 'id' ,'asc'),
		];
		return view('labor_service.create', $this->data);
	}

	public function store(LaborServiceRequest $request)
	{
		if ($this->labor_services->create($request)){

			// Redirect
			return redirect()->route('labor_service.create')
				->with('success', __('alert.crud.success.create', ['name' => Auth::user()->module()]) . $request->name);
		}
	}

	public function createLaborService(LaborServiceRequest $request)
	{
		return response()->json([
			'success' => 'success',
			'labor_service' => $this->labor_services->create($request)
		]);
	}

	public function edit(LaborService $labor_service)
	{
		$this->data = [
				'labor_service' => $labor_service,
				'labor_services' => LaborService::getSelectService(),
				'categories' => LaborCategory::getSelectData('id', 'name', '', 'id' ,'asc'),
		];
		
		return view('labor_service.edit', $this->data);
	}



	public function update(LaborServiceRequest $request, LaborService $labor_service)
	{

		if ($this->labor_services->update($request, $labor_service)){

			// Redirect
			return redirect()->route('labor_service.edit', $labor_service->id)
				->with('success', __('alert.crud.success.update', ['name' => Auth::user()->module()]) . $request->name);
		}
	}



	public function destroy(LaborService $labor_service)
	{
		// Redirect
		return redirect()->route('labor_service.index')
			->with('success', __('alert.crud.success.delete', ['name' => Auth::user()->module()]) . $this->labor_services->destroy($labor_service));
	}
}
