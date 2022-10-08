<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EchoDefaultDescriptionRequest extends FormRequest
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
			'name' => 'required|max:190',
			'slug' => 'required|max:190|unique:echo_default_descriptions,name,'. @$this->route('echo_default_description')->id,
		];
	}
}
