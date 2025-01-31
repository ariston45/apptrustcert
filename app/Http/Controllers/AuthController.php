<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function index()
	{
		if ($user = Auth::user()) {
			if ($user->level == 'admin') {
				return redirect()->intended('home');
			} elseif ($user->level == 'editor') {
				return redirect()->intended('home');
			}
		}
		return view('auth.login');
	}

	public function proses_login(Request $request)
	{
		request()->validate([
			'username' => 'required',
			'password' => 'required',
		]);
		$kredensil = $request->only('username','password');
		if (Auth::attempt($kredensil)) {
			$user = Auth::user();
			$auth_level = array('ADM','AGM','MGR.PAS','MGR.TCH','MGR','STF','STF.TCH');
			if (in_array($user->level,$auth_level)) {
				return redirect()->intended('home');
			} elseif ($user->level == 'editor') {
				return redirect()->intended('home');
			}
			return redirect()->intended('/');
		}
		return redirect('login')
		->withInput()
		->withErrors(['login_gagal' => 'Invalid username or password. <br> Please try again.']);
	}

	public function logout(Request $request)
	{
		$request->session()->flush();
		Auth::logout();
		return Redirect('login');
	}
}
