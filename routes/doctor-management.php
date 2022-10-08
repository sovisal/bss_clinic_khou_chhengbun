<?php

use Illuminate\Support\Facades\Route;





Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function () {

  Route::get('/', 'DoctorController@index')->name('index')->middleware('can:Doctor Index');
  Route::get('/create', 'DoctorController@create')->name('create')->middleware('can:Doctor Create');
  Route::post('/store', 'DoctorController@store')->name('store')->middleware('can:Doctor Create');
  Route::get('/{doctor}/edit', 'DoctorController@edit')->name('edit')->middleware('can:Doctor Edit');
  Route::put('/{doctor}/update', 'DoctorController@update')->name('update');
  Route::delete('/{doctor}/delete', 'DoctorController@destroy')->name('destroy')->middleware('can:Doctor Delete');

  Route::post('/getDetail', 'DoctorController@getDetail')->name('getDetail');

});
