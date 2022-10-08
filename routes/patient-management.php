<?php

use Illuminate\Support\Facades\Route;





Route::group(['prefix' => 'patient', 'as' => 'patient.'], function () {

  Route::get('/', 'PatientController@index')->name('index')->middleware('can:Patient Index');
  Route::get('/create', 'PatientController@create')->name('create')->middleware('can:Patient Create');
  Route::post('/store', 'PatientController@store')->name('store')->middleware('can:Patient Create');
  Route::get('/{patient}/edit', 'PatientController@edit')->name('edit')->middleware('can:Patient Edit');
  Route::put('/{patient}/update', 'PatientController@update')->name('update');
  Route::delete('/{patient}/delete', 'PatientController@destroy')->name('destroy')->middleware('can:Patient Delete');

  Route::post('/getDetail', 'PatientController@getDetail')->name('getDetail');
  Route::post('/getSelectDetail', 'PatientController@getSelectDetail')->name('getSelectDetail');
  Route::post('/getSelect2Items', 'PatientController@getSelect2Items')->name('getSelect2Items');

});
