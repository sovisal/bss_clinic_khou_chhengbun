<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaborServiceRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|max:250',
			'category_id' => 'required|max:250',
			// 'unit' => 'required',
			// 'ref_from' => 'required',
			// 'ref_to' => 'required',
		];
	}
}
