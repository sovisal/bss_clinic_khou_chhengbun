<?php

use Illuminate\Support\Facades\Route;




Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User'], function () {

  Route::get('/', 'UserController@index')->name('index')->middleware('can:User Index');
  Route::get('/create', 'UserController@create')->name('create')->middleware('can:User Create');
  Route::post('/store', 'UserController@store')->name('store')->middleware('can:User Create');
  Route::get('/profile', 'UserController@profile')->name('profile');
  Route::get('/{user}/password', 'UserController@password')->name('password')->middleware('can:User Password');
  Route::post('/password_confirm', 'UserController@password_confirm')->name('password_confirm');
  Route::get('/{user}/role', 'UserController@role')->name('role')->middleware('can:User Assign Role');
  Route::put('/{user}/update_role', 'UserController@update_role')->name('update_role')->middleware('can:User Assign Role');
  Route::get('/{user}/edit', 'UserController@edit')->name('edit')->middleware('can:User Edit');
  Route::put('/{user}/{type}/update', 'UserController@update')->name('update');
  Route::put('/{user}/image', 'UserController@image')->name('image');
  Route::delete('/{user}/delete', 'UserController@destroy')->name('destroy')->middleware('can:User Delete');
  
  // Route::get('/{user}/permission_to_user', 'UserController@permission_to_user')->name('permission_to_user');
  // Route::put('/{user}/store_permission_to_user', 'UserController@store_permission_to_user')->name('store_permission_to_user');

});


Route::group(['prefix' => 'role', 'as' => 'role.', 'namespace' => 'Role'], function () {

  Route::get('/', 'RoleController@index')->name('index')->middleware('can:Role Index');
  Route::get('/create', 'RoleController@create')->name('create')->middleware('can:Role Create');
  Route::post('/store', 'RoleController@store')->name('store')->middleware('can:Role Create');
  Route::get('/{role}/edit', 'RoleController@edit')->name('edit')->middleware('can:Role Edit');
  Route::put('/{role}/update', 'RoleController@update')->name('update')->middleware('can:Role Edit');
  Route::delete('/{role}/delete', 'RoleController@destroy')->name('destroy')->middleware('can:Role Delete');
  
  Route::get('/{role}/assign_permission', 'RoleController@assign_permission')->name('assign_permission')->middleware('can:Role Assign Permission');
  Route::put('/{role}/update_assign_permission', 'RoleController@update_assign_permission')->name('update_assign_permission')->middleware('can:Role Assign Permission');

});


Route::group(['prefix' => 'permission', 'as' => 'permission.', 'namespace' => 'Permission'], function () {

  Route::get('/', 'PermissionController@index')->name('index')->middleware('can:Permission Index');
  Route::get('/create', 'PermissionController@create')->name('create')->middleware('can:Permission Create');
  Route::post('/store', 'PermissionController@store')->name('store')->middleware('can:Permission Create');
  Route::get('/{permission}/edit', 'PermissionController@edit')->name('edit')->middleware('can:Permission Edit');
  Route::put('/{permission}/update', 'PermissionController@update')->name('update')->middleware('can:Permission Edit');
  Route::delete('/{permission}/delete', 'PermissionController@destroy')->name('destroy')->middleware('can:Permission Delete');
  
  Route::get('/permission_to_role', 'PermissionController@permission_to_role')->name('permission_to_role')->middleware('can:Permission Assign Role');
  Route::put('/store_permission_to_role', 'PermissionController@store_permission_to_role')->name('store_permission_to_role')->middleware('can:Permission Assign Role');

  Route::get('/permission_to_user', 'PermissionController@permission_to_user')->name('permission_to_user')->middleware('can:Permission Assign User');
  Route::put('/store_permission_to_user', 'PermissionController@store_permission_to_user')->name('store_permission_to_user')->middleware('can:Permission Assign User');

});


