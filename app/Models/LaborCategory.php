<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class LaborCategory extends BaseModel
{


	protected $table = 'labor_categories';

	protected $fillable = [
		'name', 'description', 'created_by', 'updated_by',
	];

  public function services()
  {
  	return $this->hasMany(LaborService::class, 'category_id');

  }

}
