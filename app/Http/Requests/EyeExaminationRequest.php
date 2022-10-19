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
			// 'ee_number' => 'required|max:8',
			'pt_name' => 'required|max:190',
			'plain_eye_vare' => 'nullable|string|max:190',
			'plain_eye_vale' => 'nullable|string|max:190',
			'with_ph_vare' => 'nullable|string|max:190',
			'with_ph_vale' => 'nullable|string|max:190',
			'with_glasses_vare' => 'nullable|string|max:190',
			'with_glasses_vale' => 'nullable|string|max:190',
			'initial_iop_re' => 'nullable|string|max:190',
			'initial_iop_le' => 'nullable|string|max:190',
			'primary_diagnosis_re' => 'nullable|string|max:190',
			'primary_diagnosis_le' => 'nullable|string|max:190',
			'orbit_re' => 'nullable|string|max:190',
			'orbit_le' => 'nullable|string|max:190',
			'ocular_movem_re' => 'nullable|string|max:190',
			'ocular_movem_le' => 'nullable|string|max:190',
			'eyelid_las_re' => 'nullable|string|max:190',
			'eyelid_las_le' => 'nullable|string|max:190',
			'conjunctiva_re' => 'nullable|string|max:190',
			'conjunctiva_le' => 'nullable|string|max:190',
			'cornea_re' => 'nullable|string|max:190',
			'cornea_le' => 'nullable|string|max:190',
			'ac_re' => 'nullable|string|max:190',
			'ac_le' => 'nullable|string|max:190',
			'lris_pupil_re' => 'nullable|string|max:190',
			'lris_pupil_le' => 'nullable|string|max:190',
			'lens_re' => 'nullable|string|max:190',
			'lens_le' => 'nullable|string|max:190',
			'retinal_reflex_re' => 'nullable|string|max:190',
			'retinal_reflex_le' => 'nullable|string|max:190',
			'image_uper_lide_re' => 'nullable|mimes:jpeg,jpg,png|max:2048',
			'image_uper_lide_le' => 'nullable|mimes:jpeg,jpg,png|max:2048',
			'image_eye_boll_re' => 'nullable|mimes:jpeg,jpg,png|max:2048',
			'image_eye_boll_le' => 'nullable|mimes:jpeg,jpg,png|max:2048',
			'image_locver_lide_re' => 'nullable|mimes:jpeg,jpg,png|max:2048',
			'image_locver_lide_le' => 'nullable|mimes:jpeg,jpg,png|max:2048',
		];
	}
}
