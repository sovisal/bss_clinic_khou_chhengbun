<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'eye_examination', 'as' => 'eye_examination.', 'namespace' => 'EyeExamination'], function () {

	Route::get('/', 'EyeExaminationController@index')->name('index')->middleware('can:EyeExamination Index');
	Route::get('/create', 'EyeExaminationController@create')->name('create')->middleware('can:EyeExamination Create');
	Route::post('/store', 'EyeExaminationController@store')->name('store')->middleware('can:EyeExamination Create');
	Route::get('/{eye_examination}/edit', 'EyeExaminationController@edit')->name('edit')->middleware('can:EyeExamination Edit');
	Route::put('/{eye_examination}/update', 'EyeExaminationController@update')->name('update')->middleware('can:EyeExamination Edit');
	Route::delete('/{eye_examination}/delete', 'EyeExaminationController@destroy')->name('destroy')->middleware('can:EyeExamination Delete');
	Route::get('/{eye_examination}/print', 'EyeExaminationController@print')->name('print')->middleware('can:EyeExamination Print');
	
});





