<?php

use App\Models\Act_activity;
use App\Models\Cert_category;
use App\Models\Cert_template;
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
use App\Models\Setup_web;
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
function genIdTemplate()
{
  $data = Cert_template::max('ctm_id');
  $new_id = $data + 1;
  return $new_id;
}
function genIdParticipant()
{
  $data = Par_participant::max('par_id');
  $new_id = $data + 1;
  return $new_id;
}

function actionAuthApi($data) {
  $main_url = Setup_web::where('sw_id',1)->first();
  $f_url = $main_url->sw_name.'/'.'api/auth_access_login';
  $response = Http::post($f_url, $data);
  return $response;
}

function genIdCert() {
  $max_id = Cert_category::max('cert_id');
  $new_id = $max_id + 1;
  return $new_id;
}

/* Tags:... */
function funcViewImage($img)
{
  if ($img == null) {
    $res = '-';
  } else {
    if (file_exists(public_path('storage/file_uploaded/'.$img))) {
      $url = asset("storage/file_uploaded/".$img );
      $res = '<img src="'.$url.'" alt="Example Image">';
    } else {
      $res = '-';
    }
  }
  return $res;
}
