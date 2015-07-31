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

Route::get('coba', 'TryController@coba');

Route::get('kantor', 'KantorController@listOffice');

Route::get('kantor/create', function()
	{
		return View::make('kantor/create');
		// echo "create_kantor";
		// $kantor = new Kantor ();
		// $kantor->createOffice ();

	});
// Route::post('kantor/simpan', function()
// 	{
// 		// return "ini simpan";
// 		// var_dump($_POST);


// 	});
Route::post('kantor/simpan', array('uses' => 'KantorController@saveOffice'));


// Route::get('rekam_kantor', function()
// 	{
// 		// echo "dlkasjflkjsaflksa";
// 		return View::make('kantor/create');
// 	});

Route::group(array('before'=>'auth'), function() { 

	Route::get('/', 'HomeController@index');

	Route::resource('arsip', 'ArsipController');
	
	Route::get('user', array('uses' => 'UserController@show'));

	Route::get('user/rekam', array('uses' => 'UserController@rekam'));

	Route::post('user/rekam', array('uses' => 'UserController@store'));

	Route::get('user/{id}', array('uses' => 'UserController@edit'));	

	Route::post('user/{id}', array('uses' => 'UserController@update'));
	
	Route::get('lokasi','LokasiController@index');
	
	Route::get('lokasi/create/{target}','LokasiController@create');
	
	Route::get('lokasi/create/{target}/{parentid}','LokasiController@create');
	
	Route::post('lokasi/store/{target}','LokasiController@store');

	Route::get('lokasi/edit/{target}/{id}','LokasiController@edit');
	
	Route::post('lokasi/update','LokasiController@update');
	
	Route::get('lokasi/destroy/{target}/{id}','LokasiController@destroy');
});