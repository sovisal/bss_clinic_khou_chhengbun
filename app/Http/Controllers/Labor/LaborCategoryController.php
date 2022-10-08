<?php

namespace App\Http\Controllers\Labor;

use App\Models\LaborCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LaborCategoryRequest;
use App\Repositories\LaborCategoryRepository;
use Auth;

class LaborCategoryController extends Controller
{

	protected $labor_categories;

	public function __construct(LaborCategoryRepository $repository)
	{
		$this->labor_categories = $repository;
	}

	public function index()
	{
		$this->data = [
				'labor_categories' => $this->labor_categories->getData(),
		];

		return view('labor_category.index', $this->data);
	}

	public function getSelectDistrict(Request $request)
	{
		return $this->labor_categories->getSelectDistrict($request);
	}


	public function create()
	{
		$this->data = [
				'labor_categories' => LaborCategory::getSelectData('id', 'name', '', 'id' ,'asc'),
		];
		return view('labor_category.create', $this->data);
	}

	public function store(LaborCategoryRequest $request)
	{
		if ($this->labor_categories->create($request)){

			// Redirect
			return redirect()->route('labor_category.create')
				->with('success', __('alert.crud.success.create', ['name' => Auth::user()->module()]) . $request->name);
		}
	}

	public function edit(LaborCategory $labor_category)
	{
		$this->data = [
				'labor_category' => $labor_category,
				'labor_categories' => LaborCategory::getSelectData('id', 'name', '', 'id' ,'asc'),
		];
		
		return view('labor_category.edit', $this->data);
	}



	public function update(LaborCategoryRequest $request, LaborCategory $labor_category)
	{

		if ($this->labor_categories->update($request, $labor_category)){

			// Redirect
			return redirect()->route('labor_category.edit', $labor_category->id)
				->with('success', __('alert.crud.success.update', ['name' => Auth::user()->module()]) . $request->name);
		}
	}



	public function destroy(LaborCategory $labor_category)
	{
		// Redirect
		return redirect()->route('labor_category.index')
			->with('success', __('alert.crud.success.delete', ['name' => Auth::user()->module()]) . $this->labor_categories->destroy($labor_category));
	}
}
