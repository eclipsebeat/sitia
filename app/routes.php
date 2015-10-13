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
	
	Route::get('mnarsip/{alias}','ArsipController@index'); //sementara
	
	Route::get('user', array('uses' => 'UserController@show'));

	Route::get('user/rekam', array('uses' => 'UserController@rekam'));

	Route::post('user/rekam', array('uses' => 'UserController@store'));

	Route::get('user/{id}', array('uses' => 'UserController@edit'));	

	Route::post('user/{id}', array('uses' => 'UserController@update'));
	
	Route::get('user/destroy/{id}', array('uses' => 'UserController@destroy'));

	Route::get('pinjam', 'PeminjamanController@index');
	
	Route::get('pinjam/create', 'PeminjamanController@create');
	
	Route::post('pinjam/create', 'PeminjamanController@store');
	
	Route::get('kembali/{id}','PeminjamanController@update');
	
	Route::get('lokasi','LokasiController@index');
	
	Route::get('lokasi/create/{target}','LokasiController@create');
	
	Route::get('lokasi/create/{target}/{parentid}','LokasiController@create');
	
	Route::post('lokasi/store/{target}','LokasiController@store');

	Route::get('lokasi/edit/{target}/{id}','LokasiController@edit');
	
	Route::post('lokasi/update','LokasiController@update');
	
	Route::get('lokasi/destroy/{target}/{id}','LokasiController@destroy');
	
	Route::get('jenisarsip','JenisArsipController@index');
	
	Route::get('jenisarsip/create','JenisArsipController@create');
	
	Route::post('jenisarsip/create','JenisArsipController@store');
	
	Route::get('jenisarsip/{id}','JenisArsipController@edit');
	
	Route::post('jenisarsip/{id}','JenisArsipController@update');
	
	Route::get('jenisarsip/destroy/{id}','JenisArsipController@destroy');
	
	Route::get('utility','UtilityController@index');

	Route::get('utility/backup','UtilityController@create');
	
	Route::post('active-menu','UtilityController@menu'); //belom selesai
	
	Route::get('search','SearchController@index');
	
	Route::post('search/store', 'SearchController@store');
	
	Route::get('search/custom', 'SearchController@custom');

	Route::post('search/custom', 'SearchController@show');
});