<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		return view('layout.app');
	}
	public function homeFunction()
	{
		$user = Auth::user();
		$users = User::get();
		
		return view('contents.page_home.home',compact('user'));
	}
	
}
