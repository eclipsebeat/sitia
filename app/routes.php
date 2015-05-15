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


Route::get('/login', 'ArsipController@login');

Route::get('/', 'ArsipController@index');

Route::get('/arsip', 'ArsipController@arsip');

Route::get('/rekam', 'ArsipController@rekamArsip');


Route::post('/simpan', 'ArsipController@store');