<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'service', 'as' => 'service.'], function () {

	Route::get('/', 'ServiceController@index')->name('index')->middleware('can:Service Index');
	Route::get('/create', 'ServiceController@create')->name('create')->middleware('can:Service Create');
	Route::post('/store', 'ServiceController@store')->name('store')->middleware('can:Service Create');
	Route::get('/{service}/edit', 'ServiceController@edit')->name('edit')->middleware('can:Service Edit');
	Route::put('/{service}/update', 'ServiceController@update')->name('update')->middleware('can:Service Edit');
	Route::delete('/{service}/delete', 'ServiceController@destroy')->name('destroy')->middleware('can:Service Delete');

	Route::post('/getDetail', 'ServiceController@getDetail')->name('getDetail');
	Route::post('/createService', 'ServiceController@createService')->name('createService');
	Route::post('/reloadSelectService', 'ServiceController@reloadSelectService')->name('reloadSelectService');

});

Route::group(['prefix' => 'invoice', 'as' => 'invoice.', 'namespace' => 'Invoice'], function () {

	Route::get('/', 'InvoiceController@index')->name('index')->middleware('can:Invoice Index');
	Route::get('/create', 'InvoiceController@create')->name('create')->middleware('can:Invoice Create');
	Route::post('/store', 'InvoiceController@store')->name('store')->middleware('can:Invoice Create');
	Route::get('/{invoice}/edit', 'InvoiceController@edit')->name('edit')->middleware('can:Invoice Edit');
	Route::put('/{invoice}/update', 'InvoiceController@update')->name('update')->middleware('can:Invoice Edit');
	Route::delete('/{invoice}/delete', 'InvoiceController@destroy')->name('destroy')->middleware('can:Invoice Delete');
	Route::get('/{invoice}/print', 'InvoiceController@print')->name('print');
	Route::post('/status', 'InvoiceController@status')->name('status');
	
	
	Route::put('/{invoice}/save_order', 'InvoiceController@save_order')->name('save_order');
	Route::post('/getDatatable', 'InvoiceController@getDatatable')->name('getDatatable');
	Route::post('/getInvoicePreview', 'InvoiceController@getInvoicePreview')->name('getInvoicePreview');
	Route::post('/getDetail', 'InvoiceController@getDetail')->name('getDetail');
	Route::post('/getInvoiceSelect', 'InvoiceController@getInvoiceSelect')->name('getInvoiceSelect');
	
	Route::group(['prefix' => 'invoice_detail', 'as' => 'invoice_detail.'], function () {
		Route::post('/store', 'InvoiceController@invoiceDetailStore')->name('store');
		Route::post('/update', 'InvoiceController@invoiceDetailUpdate')->name('update');
		Route::delete('/{invoice_detail}/delete', 'InvoiceController@invoice_detail_destroy')->name('destroy');
		Route::PUT('/{invoice}/save_order', 'InvoiceController@save_order')->name('save_order');
		Route::post('/getItemDetail', 'InvoiceController@getItemDetail')->name('getDetail');
		Route::post('/deleteInvoiceDetail', 'InvoiceController@deleteInvoiceDetail')->name('deleteInvoiceDetail');
	});

});





