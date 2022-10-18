<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EyeExaminationRequest extends FormRequest
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
		  'date' => 'required|date',
		  'ee_number' => 'required|max:8',
		  'pt_name' => 'required|max:190',
		];
	}
}
