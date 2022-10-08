<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EchoDefaultDescription extends BaseModel
{
	protected $table = 'echo_default_descriptions';
	
	protected $fillable = [
		'name', 'slug', 'description',
	];


}
