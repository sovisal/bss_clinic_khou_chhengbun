<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use DB;


class PermissionRepository
{

	public function getData()
	{
		return Permission::orderBy('created_at', 'desc')->get();
	}


	public function create($request)
	{
		$permission = null;

		if ($request->crud == 1) {
			Permission::create([
				'name' => $request->name.' Index',
				'description' => $request->name.' Index',
			]);

			Permission::create([
				'name' => $request->name.' Create',
				'description' => 'Create new '. $request->name,
			]);

			Permission::create([
				'name' => $request->name.' Edit',
				'description' => 'Edit Existed '. $request->name,
			]);

			$permission = Permission::create([
				'name' => $request->name.' Delete',
				'description' => 'Delete Existed  '. $request->name,
			]);
			
		}else{
			$permission = Permission::create([
				'name' => $request->name,
				'description' => $request->description,
			]);
		}


		return $permission;
	
	}


	public function edit($id)
	{

		return $permission = Permission::find($id);
		
	}


	public function update($request, $id)
	{

		return $permission = Permission::find($id)->update(request(['name','description']));

	}

	public function destroy($id)
	{

		$permission = Permission::find($id);
		$name = $permission->name;
		if($permission->delete()){
			return $name ;
		}

	}

}