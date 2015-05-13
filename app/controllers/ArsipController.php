<?php


class ArsipController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function login()
	{
		return View::make('arsip.login');
	}

	public function index()
	{
		return View::make('arsip.index');
	}

	public function arsip()
	{
		$arsips = Arsip::all();
		//var_dump($arsips->toArray());
		// Show the page
		return View::make('arsip.arsip', compact('arsips'));
	}

}