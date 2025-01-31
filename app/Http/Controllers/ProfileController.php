<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Menu;

class ProfileController extends Controller
{
  public function __construct()
	{
		$this->middleware('rulesystem');
	}

	public function IdenUser()
  {
    $id = Auth::user()->id;
    $user = User::where('id',$id)->first();
    return $user;
  }

  public function IdenMenu()
  {
    $level = Auth::user()->level;
    $menus = Menu::where('mn_level_user',$level)->where('mn_parent_id', '=', 0)->get();
    return $menus;
  }
}
