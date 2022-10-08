<?php

namespace App\Http\Controllers\Echoes;

use App\Models\EchoDefaultDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EchoDefaultDescriptionRequest;
use App\Repositories\EchoDefaultDescriptionRepository;
use Auth;

class EchoDefaultDescriptionController extends Controller
{

	protected $echo_default_descriptions;

	public function __construct(EchoDefaultDescriptionRepository $repository)
	{
		$this->echo_default_descriptions = $repository;
	}

	public function index()
	{
		$this->data = [
				'echo_default_descriptions' => $this->echo_default_descriptions->getData(),
		];

		return view('echo_default_description.index', $this->data);
	}

	public function getDetail(Request $request)
	{
		return $this->echo_default_descriptions->getDetail($request);
	}

	public function create()
	{
		return view('echo_default_description.create');
	}

	public function store(EchoDefaultDescriptionRequest $request)
	{
		if ($this->echo_default_descriptions->create($request)){

			// Redirect
			return redirect()->route('echo_default_description.create')
				->with('success', __('alert.crud.success.create', ['name' => Auth::user()->module()]) . $request->name);
		}
	}

	public function edit(EchoDefaultDescription $echo_default_description)
	{
		$this->data = [
				'echo_default_description' => $echo_default_description,
		];
		
		return view('echo_default_description.edit', $this->data);
	}



	public function update(EchoDefaultDescriptionRequest $request, EchoDefaultDescription $echo_default_description)
	{

		if ($this->echo_default_descriptions->update($request, $echo_default_description)){

			// Redirect
			return redirect()->route('echo_default_description.index')
				->with('success', __('alert.crud.success.update', ['name' => Auth::user()->module()]) . $request->name);
		}
	}



	public function destroy(EchoDefaultDescription $echo_default_description)
	{
		// Redirect
		return redirect()->route('echo_default_description.index')
			->with('success', __('alert.crud.success.delete', ['name' => Auth::user()->module()]) . $this->echo_default_descriptions->destroy($echo_default_description));
	}
}
