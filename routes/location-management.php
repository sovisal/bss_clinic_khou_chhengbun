<?php

use Illuminate\Support\Facades\Route;





Route::group(['prefix' => 'province', 'as' => 'province.', 'namespace' => 'Location'], function () {

	Route::get('/', 'FourLevelAddressController@index')->name('index')->middleware('can:Province Index');
	Route::get('/create', 'FourLevelAddressController@create')->name('create')->middleware('can:Province Create');
	Route::post('/store', 'FourLevelAddressController@store')->name('store')->middleware('can:Province Create');
	Route::get('/{province}/edit', 'FourLevelAddressController@edit')->name('edit')->middleware('can:Province Edit');
	Route::put('/{province}/update', 'FourLevelAddressController@update')->name('update')->middleware('can:Province Edit');
	// Route::delete('/{province}/delete', 'ProvinceController@destroy')->name('destroy')->middleware('can:Province Delete');
	
	Route::post('/getSelectDistrict', 'ProvinceController@getSelectDistrict')->name('getSelectDistrict');
});

Route::group(['prefix' => 'district', 'as' => 'district.', 'namespace' => 'Location'], function () {

	Route::get('/', 'DistrictController@index')->name('index')->middleware('can:District Index');
	Route::get('/create', 'DistrictController@create')->name('create')->middleware('can:District Create');
	Route::post('/store', 'DistrictController@store')->name('store')->middleware('can:District Create');
	Route::get('/{district}/edit', 'DistrictController@edit')->name('edit')->middleware('can:District Edit');
	Route::put('/{district}/update', 'DistrictController@update')->name('update')->middleware('can:District Edit');
	Route::delete('/{district}/delete', 'DistrictController@destroy')->name('destroy')->middleware('can:District Delete');

});

Route::group(['prefix' => 'address', 'as' => 'address.', 'namespace' => 'Location'], function () {
	Route::post('/getFullAddress', 'FourLevelAddressController@BSSFullAddress')->name('getFullAddress');
	Route::post('/getProvinceChileSelection', 'FourLevelAddressController@District')->name('getProvinceChileSelection');
	Route::post('/getDistrictChileSelection', 'FourLevelAddressController@Commune')->name('getDistrictChileSelection');
	Route::post('/getCommuneChileSelection', 'FourLevelAddressController@Village')->name('getCommuneChileSelection');
});


