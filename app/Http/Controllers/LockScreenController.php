<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockScreenController extends Controller
{
	public function get(){
	
	// only if user is logged in
		if(Auth::check()){
			\Session::put('locked', true);

			return view('locked');
		}

		return redirect('/login');
	}

	public function post()
	{
	// if user in not logged in 
		if(!\Auth::check())
			return redirect('/login');

		$password = \Input::get('password');

		if(\Hash::check($password,\Auth::user()->password)){
			\Session::forget('locked');
			return redirect('/home');
		}
		
		// ... handle the password mismatch errors
	}
}
