<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'echo_default_description', 'as' => 'echo_default_description.', 'namespace' => 'Echoes'], function () {

	Route::get('/', 'EchoDefaultDescriptionController@index')->name('index')->middleware('can:Echo Default Description Index');
	Route::get('/create', 'EchoDefaultDescriptionController@create')->name('create')->middleware('can:Echo Default Description Create');
	Route::post('/store', 'EchoDefaultDescriptionController@store')->name('store')->middleware('can:Echo Default Description Create');
	Route::get('/{echo_default_description}/edit', 'EchoDefaultDescriptionController@edit')->name('edit')->middleware('can:Echo Default Description Edit');
	Route::put('/{echo_default_description}/update', 'EchoDefaultDescriptionController@update')->name('update')->middleware('can:Echo Default Description Edit');
	Route::delete('/{echo_default_description}/delete', 'EchoDefaultDescriptionController@destroy')->name('destroy')->middleware('can:Echo Default Description Delete');
	
	Route::post('/getDetail', 'EchoDefaultDescriptionController@getDetail')->name('getDetail');
});


Route::group(['prefix' => 'echoes', 'as' => 'echoes.', 'namespace' => 'Echoes'], function () {

	Route::get('/{type}/type', 'EchoesController@index')->name('index')->middleware('can:Echo Index');
	Route::get('/{type}/create', 'EchoesController@create')->name('create')->middleware('can:Echo Create');
	Route::post('/{type}/store', 'EchoesController@store')->name('store')->middleware('can:Echo Create');
	Route::get('/{type}/{echoes}/edit', 'EchoesController@edit')->name('edit')->middleware('can:Echo Edit');
	Route::put('/{type}/{echoes}/update', 'EchoesController@update')->name('update')->middleware('can:Echo Edit');
	Route::delete('/{type}/{echoes}/delete', 'EchoesController@destroy')->name('destroy')->middleware('can:Echo Delete');
	Route::get('/{type}/{echoes}/print', 'EchoesController@print')->name('print');
	
	Route::put('/{type}/{echoes}/save_order', 'EchoesController@save_order')->name('save_order');
	Route::post('/{type}/getDatatable', 'EchoesController@getDatatable')->name('getDatatable');
	Route::post('/{type}/getInvoicePreview', 'EchoesController@getInvoicePreview')->name('getInvoicePreview');
	Route::post('/{type}/getDetail', 'EchoesController@getDetail')->name('getDetail');
	Route::post('/{type}/getInvoiceSelect', 'EchoesController@getInvoiceSelect')->name('getInvoiceSelect');
});





