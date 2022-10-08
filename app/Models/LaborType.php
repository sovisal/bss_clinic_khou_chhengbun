<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaborType extends BaseModel
{
	protected $table = 'labor_types';
	
	protected $fillable = [
		'name', 'slug', 'description',
	];


}
