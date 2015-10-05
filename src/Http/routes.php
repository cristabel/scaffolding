<?php

Route::get('scaffolding/test', 'Cristabel\Scaffolding\Http\Controllers\ScaffoldingController@test');

Route::get('scaffolding/{model}', 'Cristabel\Scaffolding\Http\Controllers\ScaffoldingController@getIndex');
Route::get('scaffolding/{model}/edit/{id}', 'Cristabel\Scaffolding\Http\Controllers\ScaffoldingController@getEdit')->where('id', '[0-9]+');
Route::get('scaffolding/{model}/delete/{id}', 'Cristabel\Scaffolding\Http\Controllers\ScaffoldingController@getDelete')->where('id', '[0-9]+');
Route::post('scaffolding/{model}/save', 'Cristabel\Scaffolding\Http\Controllers\ScaffoldingController@postSave');


/*
Route::controllers([
	'scaffolding' => 'Cristabel\Scaffolding\Http\Controllers\ScaffoldingController'
]);
*/
