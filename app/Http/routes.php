<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('photos');
});

Route::get('photos', [
	'as'=> 'index',
	'uses'=>'PhotoController@index'
]);

Route::get('photos/create', [
	'as'=>'create',
	'uses'=>'PhotoController@create'
]);

Route::post('photos/store', [
	'as'=>'store',
	'uses'=>'PhotoController@store'
]);

Route::get('photos/show/{id}', 'PhotoController@show');
