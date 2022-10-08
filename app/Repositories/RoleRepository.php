<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Auth;


class RoleRepository
{

	public function getData()
	{
		return Role::all();
	}


	public function create($request)
	{
		$role = Role::create([
			'name' => $request->name,
			'description' => $request->description,
		]);

		return $role;
	}


	public function update($request, $id)
	{

		return $role = Role::find($id)->update(request(['name','description']));

	}

	public function destroy($id)
	{
		$role = Role::find($id);
		$name = $role->name;
		if($role->delete()){
			return $name ;
		}
	}

	
	public function update_assign_permission($request, $role)
	{
		
		return $role->syncPermissions($request->permission);

	}

}