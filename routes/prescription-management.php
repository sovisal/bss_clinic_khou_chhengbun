<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'prescription', 'as' => 'prescription.', 'namespace' => 'Prescription'], function () {

	Route::get('/', 'PrescriptionController@index')->name('index')->middleware('can:Prescription Index');
	Route::get('/create', 'PrescriptionController@create')->name('create')->middleware('can:Prescription Create');
	Route::post('/store', 'PrescriptionController@store')->name('store')->middleware('can:Prescription Create');
	Route::get('/{prescription}/edit', 'PrescriptionController@edit')->name('edit')->middleware('can:Prescription Edit');
	Route::put('/{prescription}/update', 'PrescriptionController@update')->name('update')->middleware('can:Prescription Edit');
	Route::delete('/{prescription}/delete', 'PrescriptionController@destroy')->name('destroy')->middleware('can:Prescription Delete');
	Route::get('/{prescription}/print', 'PrescriptionController@print')->name('print');
	Route::post('/{prescription}/status', 'PrescriptionController@status')->name('status');
	
	Route::put('/{prescription}/save_order', 'PrescriptionController@save_order')->name('save_order');
	Route::post('/getDatatable', 'PrescriptionController@getDatatable')->name('getDatatable');
	Route::post('/getPrescriptionPreview', 'PrescriptionController@getPrescriptionPreview')->name('getPrescriptionPreview');
	Route::post('/getDetail', 'PrescriptionController@getDetail')->name('getDetail');
	Route::post('/getPrescriptionSelect', 'PrescriptionController@getPrescriptionSelect')->name('getPrescriptionSelect');
	
	Route::group(['prefix' => 'prescription_detail', 'as' => 'prescription_detail.'], function () {
		Route::post('/store', 'PrescriptionController@prescriptionDetailStore')->name('store');
		Route::post('/update', 'PrescriptionController@prescriptionDetailUpdate')->name('update');
		Route::delete('/{prescription_detail}/delete', 'PrescriptionController@prescription_detail_destroy')->name('destroy');
		Route::PUT('/{prescription}/save_order', 'PrescriptionController@save_order')->name('save_order');
		Route::post('/getItemDetail', 'PrescriptionController@getItemDetail')->name('getDetail');
		Route::post('/deletePrescriptionDetail', 'PrescriptionController@deletePrescriptionDetail')->name('deletePrescriptionDetail');
	});

});





