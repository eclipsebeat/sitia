<?php


class UserController extends BaseController {

	public function index()
	{
		$users = User::all();
		//var_dump($arsips->toArray());
		// Show the page
		return View::make('user.index', compact('users'));
	}


}