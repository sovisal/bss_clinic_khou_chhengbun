<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'clinic_name_kh' => 'required|max:255',
            'clinic_name_en' => 'required|max:255',
            'phone' => 'required|max:190',
            'address' => 'required',
            'description' => 'required',
            'echo_address' => 'required',
            'echo_description' => 'required',
        ];
    }
}
