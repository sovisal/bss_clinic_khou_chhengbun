<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'labor_category', 'as' => 'labor_category.', 'namespace' => 'Labor'], function () {

	Route::get('/', 'LaborCategoryController@index')->name('index')->middleware('can:Labor Category Index');
	Route::get('/create', 'LaborCategoryController@create')->name('create')->middleware('can:Labor Category Create');
	Route::post('/store', 'LaborCategoryController@store')->name('store')->middleware('can:Labor Category Create');
	Route::get('/{labor_category}/edit', 'LaborCategoryController@edit')->name('edit')->middleware('can:Labor Category Edit');
	Route::put('/{labor_category}/update', 'LaborCategoryController@update')->name('update')->middleware('can:Labor Category Edit');
	Route::delete('/{labor_category}/delete', 'LaborCategoryController@destroy')->name('destroy')->middleware('can:Labor Category Delete');

	Route::post('/getDetail', 'LaborCategoryController@getDetail')->name('getDetail');
	Route::post('/createLaborCategory', 'LaborCategoryController@createLaborCategory')->name('createLaborCategory');
	Route::post('/reloadSelectLaborCategory', 'LaborCategoryController@reloadSelectLaborCategory')->name('reloadSelectLaborCategory');

});


Route::group(['prefix' => 'labor_service', 'as' => 'labor_service.', 'namespace' => 'Labor'], function () {

	Route::get('/', 'LaborServiceController@index')->name('index')->middleware('can:Labor Service Index');
	Route::get('/create', 'LaborServiceController@create')->name('create')->middleware('can:Labor Service Create');
	Route::post('/store', 'LaborServiceController@store')->name('store')->middleware('can:Labor Service Create');
	Route::get('/{labor_service}/edit', 'LaborServiceController@edit')->name('edit')->middleware('can:Labor Service Edit');
	Route::put('/{labor_service}/update', 'LaborServiceController@update')->name('update')->middleware('can:Labor Service Edit');
	Route::delete('/{labor_service}/delete', 'LaborServiceController@destroy')->name('destroy')->middleware('can:Labor Service Delete');

	Route::post('/getDetail', 'LaborServiceController@getDetail')->name('getDetail');
	Route::post('/createLaborService', 'LaborServiceController@createLaborService')->name('createLaborService');
	Route::post('/reloadSelectLaborService', 'LaborServiceController@reloadSelectLaborService')->name('reloadSelectLaborService');


});

Route::group(['prefix' => 'labor', 'as' => 'labor.', 'namespace' => 'Labor'], function () {

	Route::get('/', 'LaborController@index')->name('index')->middleware('can:Labor Index');
	Route::get('/{type}/create', 'LaborController@create')->name('create')->middleware('can:Labor Create');
	Route::post('/{type}/store', 'LaborController@store')->name('store')->middleware('can:Labor Create');
	Route::get('/{type}/{labor}/edit', 'LaborController@edit')->name('edit')->middleware('can:Labor Edit');
	Route::put('/{type}/{labor}/update', 'LaborController@update')->name('update')->middleware('can:Labor Edit');
	Route::delete('/{type}/{labor}/delete', 'LaborController@destroy')->name('destroy')->middleware('can:Labor Delete');
	Route::get('/{labor}/print', 'LaborController@print')->name('print')->middleware('can:Labor Print');
	
	Route::get('/report', 'LaborController@report')->name('report')->middleware('can:Labor Report');
	Route::post('/getReport', 'LaborController@getReport')->name('getReport')->middleware('can:Labor Report');
	
	Route::post('/getDatatable', 'LaborController@getDatatable')->name('getDatatable');
	Route::post('/getLaborPreview', 'LaborController@getLaborPreview')->name('getLaborPreview');
	Route::post('/getDetail', 'LaborController@getDetail')->name('getDetail');
	Route::post('/getLaborSelect', 'LaborController@getLaborSelect')->name('getLaborSelect');
	Route::post('/getLaborServiceCheckList', 'LaborController@getLaborServiceCheckList')->name('getLaborServiceCheckList');
	Route::post('/getCheckedServicesList', 'LaborController@getCheckedServicesList')->name('getCheckedServicesList');
	
	Route::group(['prefix' => 'labor_detail', 'as' => 'labor_detail.'], function () {
		Route::post('/storeAndGetLaborDetail', 'LaborController@storeAndGetLaborDetail')->name('storeAndGetLaborDetail');
		
		Route::delete('/{labor_detail}/delete', 'LaborController@labor_detail_destroy')->name('destroy');
		Route::PUT('/{labor}/save_order', 'LaborController@save_order')->name('save_order');
		Route::post('/getItemDetail', 'LaborController@getItemDetail')->name('getDetail');
		Route::post('/deleteLaborDetail', 'LaborController@deleteLaborDetail')->name('deleteLaborDetail');
	});

});





