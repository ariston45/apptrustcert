<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cst_userlist;
use App\Models\Cst_customer;
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
    $colect_data = Cst_userlist::leftJoin('cst_customers','cst_userlists.li_cst','=','cst_customers.cst_id')
    ->where('li_user', $user->id)
    ->orderBy('li_id','asc')
    ->get();
		return view('contents.page_home.home',compact('colect_data','user'));
	}

}
