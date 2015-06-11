<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		//var_dump($arsips->toArray());
		// Show the page
		return View::make('user.index', compact('users'));
	}

	public function showLogin(){

		return View::make('login');
	}

	public function doLogin(){

		$rules = array(
		    'username'    => 'required', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    // create our user data for the authentication
		    $userdata = array(
		        'username'     => Input::get('username'),
		        'password'  => Input::get('password')
		    );

		    // attempt to do the login
		    if (Auth::attempt($userdata)) {

		        return Redirect::to('/');

		    } else {        

		        // validation not successful, send back to form 
		        return Redirect::to('login');

		    }

		}
		
	}

	public function doLogout(){

		Auth::logout();
		return Redirect::to('login')->with('message', 'Your are now logged out!');
	}

	public function show(){

        $users = User::get();

        //var_dump($profile);

        return View::make('user.index', compact('users'));

	}

	public function edit($id){

       $user = User::find($id);

       //var_dump($user);

       return View::make('user.edit', compact('user'));

	}

	public function update(){

	}

}
