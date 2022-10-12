<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EyeExamination extends Model
{
	protected $guarded = ['id'];

	protected $table = 'eye_examinations';

	public function patient()
	{
		return $this->belongsTo(Patient::class, 'patient_id');
	}

}
