<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'medicine', 'as' => 'medicine.'], function () {

	Route::get('/', 'MedicineController@index')->name('index')->middleware('can:Medicine Index');
	Route::get('/create', 'MedicineController@create')->name('create')->middleware('can:Medicine Create');
	Route::post('/store', 'MedicineController@store')->name('store')->middleware('can:Medicine Create');
	Route::get('/{medicine}/edit', 'MedicineController@edit')->name('edit')->middleware('can:Medicine Edit');
	Route::put('/{medicine}/update', 'MedicineController@update')->name('update')->middleware('can:Medicine Edit');
	Route::delete('/{medicine}/delete', 'MedicineController@destroy')->name('destroy')->middleware('can:Medicine Delete');
	
	Route::post('/getDetail', 'MedicineController@getDetail')->name('getDetail');
});


Route::group(['prefix' => 'usage', 'as' => 'usage.'], function () {

	Route::get('/', 'UsageController@index')->name('index')->middleware('can:Usage Index');
	Route::get('/create', 'UsageController@create')->name('create')->middleware('can:Usage Create');
	Route::post('/store', 'UsageController@store')->name('store')->middleware('can:Usage Create');
	Route::get('/{usage}/edit', 'UsageController@edit')->name('edit')->middleware('can:Usage Edit');
	Route::put('/{usage}/update', 'UsageController@update')->name('update')->middleware('can:Usage Edit');
	Route::delete('/{usage}/delete', 'UsageController@destroy')->name('destroy')->middleware('can:Usage Delete');

});


