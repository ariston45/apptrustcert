<?php

use App\Models\Act_activity;
use App\Models\Cst_personal;
use App\Models\Menu;
use App\Models\Cst_customer;
use App\Models\Cst_institution;
use App\Models\Cst_location;
use App\Models\Opr_value_product;
use App\Models\Prs_lead;
use App\Models\Opr_opportunity;
use App\Models\Opr_value_other;
use App\Models\Ord_purchase;
use App\Models\Par_participant;
use App\Models\Prd_principle;
use App\Models\Prd_product;
use App\Models\Rec_gen_record;
use App\Models\User;
use App\Models\User_structure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Query\Builder;

function auth_user(){
  $usr = Auth::user();
  $user = User::where('id',$usr->id)
  ->first();
  return $user;
}

function checkRule($arr_value){
  $user = Auth::user();
  if (is_array($arr_value)) {
    if (in_array($user->level,$arr_value)) {
      return true;
    }else {
      return false;
    }
  }else {
    return "Data must be array. exp: array('a','b','...')";
  }
}
function checkTeamMgr($id){
  $user= User_structure::where('usr_user_id',$id)->select('usr_team_id')->first();
  $user_structure = User_structure::where('usr_team_id',$user->usr_team_id)->select('usr_user_id')->get();
  $ids = array();
  foreach ($user_structure as $key => $value) {
    $ids[$key] = $value->usr_user_id;
  }
  return $ids;
}


function quickRandom($length){
  $random = Str::random($length);
  return $random;
}



/* Tags:... */
function initUser()
{
  $id = Auth::user()->id;
  $user = User::where('id', $id)->first();
  return $user;
}
/* Tags:... */
function initMenu()
{
  $level = Auth::user()->level;
  $menus = Menu::where('mn_level_user', $level)->where('mn_parent_id', '=', 0)->get();
  return $menus;
}

/* Tags:... */
function rulesFeature($data)
{
  $level = Auth::user()->level;
  if (in_array($level,$data)) {
    return true;
  }else{
    return false;
  }
}

function getIdCustomer()
{
  $max_id = Cst_customer::max('cst_id');
  $new_id = $max_id + 1;
  return $new_id;
}

function genIdRecord()
{
  $data = Rec_gen_record::max('rec_id');
  $new_id = $data + 1;
  return $new_id;
}
function genIdParticipant()
{
  $data = Par_participant::max('par_id');
  $new_id = $data + 1;
  return $new_id;
}
