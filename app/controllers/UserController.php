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
		$title = 'RUH User';
		$description = 'Halaman pengelolaan user';
        //var_dump($profile);

        return View::make('user.index', compact('users','title','description'));

	}

	public function rekam()
	{
		$title = 'Rekam User';
		$description = 'Halaman perekaman user';
		return View::make('user.rekam',compact('title','description'));
	}

	public function store()
	{
		$rules = array(
		    'nip'    => 'required|min:17',
		    'username'    => 'required', // make sure the email is an actual email
		    'nmdepan'    => 'required|string',
		    'nmbelakang'    => 'required|string',
		    'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
		    'password_confirmation' => 'required|same:password'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
		    return Redirect::to('user/rekam')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    $user = new User;
		    $user->nip     = Input::get('nip');
		    $user->username     = Input::get('username');
		    $user->nmdepan     = Input::get('nmdepan');
		    $user->nmbelakang     = Input::get('nmbelakang');
		    $user->password  = Hash::make(Input::get('password'));
			

		    $user->save();

		    return Redirect::to('user');

		}
	}

	public function edit($id){

       $user = User::find($id);
		$title = 'Ubah User';
		$description = 'Halaman ubah data user';
       //var_dump($user);

       return View::make('user.edit', compact('user','title','description','id'));

	}

	public function update(){
		$rules = array(
		    'nip'    => 'required|min:18',
		    'nmdepan'    => 'required|string',
		    'nmbelakang'    => 'required|string'
		);
		$id = Input::get('id');
		$validator = Validator::make(Input::all(), $rules);
		$user = User::find($id);
		if ($validator->fails()) {
		    return Redirect::to('user/'.$id)
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    $user->nip     = Input::get('nip');
		    $user->nmdepan     = Input::get('nmdepan');
		    $user->nmbelakang     = Input::get('nmbelakang');
		    $user->save();

		    return Redirect::to('user');

		}
	}
	
	public function destroy($id){
		$user = User::find($id);
		$user->delete();
		return Redirect::to('user');
	}

}
