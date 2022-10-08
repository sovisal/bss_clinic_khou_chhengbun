<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Usage extends BaseModel
{


	protected $table = 'usages';

	protected $fillable = [
		'name', 'description', 'created_by', 'updated_by',
	];




}
