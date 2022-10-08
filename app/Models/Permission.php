<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $table = 'permissions';
	
	protected $fillable = [
		'name', 'description',
	];

  public function users()
  {
  	return $this->hasMany('App\Models\User', 'role_id');
  }
  
  public static function getSelectData()
  {

      $collection = parent::where('id','>', 1)->get();

      $items = [];
      foreach ($collection as $model) {
        $items[$model->name] = $model->name;
      }
      return $items;
  }

}
