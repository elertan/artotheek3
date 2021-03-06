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
Route::get('/', 'IndexController@index');

Route::get('/artwork', 'ArtworkController@index');
Route::get('/artwork/json', 'ArtworkController@json');
Route::get('/artwork/create', 'ArtworkController@create');
Route::post('/artwork/set-state', 'ArtworkController@setState');
Route::get('/artwork/{id}', 'ArtworkController@show');

Route::get('/artist', 'ArtistController@index');
Route::get('/artist/{id}', 'ArtistController@show');

Route::get('/news', 'NewsController@index');
Route::get('/news/create', 'NewsController@create');
Route::post('/news/store', 'NewsController@store');
Route::post('/news/update/{id}', 'NewsController@update');
Route::post('/news/destroy', 'NewsController@destroy');
Route::get('/news/{id}/edit', 'NewsController@edit');
Route::get('/news/{id}', 'NewsController@show');

Route::get('/admin', 'AdministrationController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
