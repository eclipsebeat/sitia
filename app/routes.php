<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Route::model('arsip', 'Arsip');

Route::get('login', array('uses' => 'UserController@showLogin'));

Route::post('login', array('uses' => 'UserController@doLogin'));

Route::get('logout', array('uses' => 'UserController@doLogout'));

Route::group(array('before'=>'auth'), function() { 

	Route::get('/', 'HomeController@index');

	Route::resource('arsip', 'ArsipController');
	
	Route::get('user', array('uses' => 'UserController@show'));

	Route::get('user/{id}', array('uses' => 'UserController@edit'));

	Route::post('user/{id}', array('uses' => 'UserController@update'));
});