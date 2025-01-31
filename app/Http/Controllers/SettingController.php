<?php

namespace App\Http\Controllers;

use App\Models\Cst_customer;
use App\Models\Cst_personal;
use App\Models\Opr_opportunity;
use App\Models\Prd_principle;
use App\Models\Prs_lead;
use App\Models\User;
use App\Models\User_division;
use App\Models\User_structure;
use App\Models\User_team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class SettingController extends Controller
{
	# <===========================================================================================================================================================>
	/* Tags:... */
	public function sourceDataUser(Request $request)
	{
		$colect_data = User_structure::join('users','user_structures.usr_user_id','=','users.id')
		->leftjoin('user_teams','user_structures.usr_team_id','=','user_teams.uts_id')
		->leftjoin('user_divisions','user_structures.usr_division_id','=','user_divisions.div_id')
		->select('id','name','level','username','usr_user_id','uts_team_name','div_name')
		->get();
		return DataTables::of($colect_data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('menu', function ($colect_data) {
			return '
			<div style="text-align:center;">
			<button type="button" class="badge bg-cyan" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ri-list-settings-line"></i></button>
			<div class="dropdown-menu" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 38px);">
			<a class="dropdown-item" href="'.url('setting/user').'/'.$colect_data->id.'"><i class="ri-folder-user-line" style="margin-right:6px;"></i>Detail User</a>
      </div></div>';
		})
		->addColumn('name', function ($colect_data) {
			return $colect_data->name;
		})
		->addColumn('username', function ($colect_data) {
			return $colect_data->username;
		})
		->addColumn('level', function ($colect_data) {
			return $colect_data->level;
		})
		->addColumn('str_level', function ($colect_data) {
			return $colect_data->usr_str_level;
		})
		->addColumn('team_name', function ($colect_data) {
			return $colect_data->uts_team_name;
		})
		->addColumn('div_name', function ($colect_data) {
			return $colect_data->div_name;
		})
		->rawColumns(['name','username','team_name','email','menu','str_level','div_name'])
		->make('true');
	}
	public function sourceDataDevision(Request $request)
	{
		$colect_data = User_division::get();
		return DataTables::of($colect_data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('menu', function ($colect_data) {
			return '
			<div style="text-align:center;">
			<button type="button" class="badge bg-cyan" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ri-list-settings-line"></i></button>
			<div class="dropdown-menu" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 38px);">
			<a class="dropdown-item" href="'.url('setting/division').'/'.$colect_data->div_id.'"><i class="ri-folder-user-line" style="margin-right:6px;"></i>Detail Division</a>
      </div></div>';
		})
		->addColumn('name', function ($colect_data) {
			return $colect_data->div_name;
		})
		->rawColumns(['name','menu'])
		->make('true');
	}
	/* Tags:... */
	public function sourceDataTeam(Request $request)
	{
		$colect_data = User_team::join('user_divisions','user_teams.uts_division','=','user_divisions.div_id')->get();
		return DataTables::of($colect_data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('menu', function ($colect_data) {
			return '
			<div style="text-align:center;">
			<button type="button" class="badge bg-cyan" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ri-list-settings-line"></i></button>
			<div class="dropdown-menu" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 38px);">
			<a class="dropdown-item" href="'.url('setting/team').'/'.$colect_data->uts_id.'"><i class="ri-folder-user-line" style="margin-right:6px;"></i>Detail Division</a>
      </div></div>';
		})
		->addColumn('name', function ($colect_data) {
			return $colect_data->uts_team_name;
		})
		->addColumn('division', function ($colect_data) {
			return $colect_data->div_name;
		})
		->rawColumns(['name','division','menu'])
		->make('true');
	}
	#user #view_user
	public function UserDataView()
	{
		return view('contents.page_setting.all_users');
	}
	/* Tags:... */
	public function UserDetailView(Request $request)
	{
		$user = Auth::user();
		if ($user->level == 'STF') {
			$url_close = 'setting/user/'.$user->id;
		}else {
			$url_close = 'setting/user';
		}
		
		$data_user = User_structure::join('users','user_structures.usr_user_id','=','users.id')
		->leftjoin('user_divisions','user_structures.usr_division_id','=','user_divisions.div_id')
		->leftjoin('user_teams','user_structures.usr_team_id','=','user_teams.uts_id')
		->where('usr_user_id',$request->id)
		->first();
		$id_cst = $request->id;
		$user_all = User::whereIn('level',['MKT','MGR.PAS','MGR','AGM','TCK'])->get();
		$division = User_division::get();
		$user_str = User_structure::where('usr_user_id',$user->id)
		->get();
		$divisions = User_division::get();
		$team = User_team::get();
		// dd($data_user);
		$access = array('STF' => 'Staff','MGR'=>'Manager','MGR.PAS'=>'Manager All Access', 'AGM' => 'Management','ADM' => 'Administrator');
		return view('contents.page_setting.form_update_user',compact('data_user','user','user_str','division','team','access','url_close'));
	}
	/* Tags:... */
	public function actionGetTean(Request $request)
	{
		$team = User_team::where('uts_division',$request->id)->get();
    foreach ($team as $key => $value) {
      $data[$key] = [
        'id' => $value->uts_id,
        'title' => $value->uts_team_name
      ];
    }
    $result = [
      'param'=>true,
      'data' => $data
    ];
    return $result;
	}
	/* Tags:... */
	public function createUser(Request $request)
	{
		$id_cst = $request->id;
		$user = Auth::user();
		$user_all = User::whereIn('level',['MKT','MGR.PAS','MGR','AGM','TCK'])->get();
		$division = User_division::get();
		$user_str = User_structure::where('usr_user_id',$user->id)
		->first();
		// dd($user_str);
		$divisions = User_division::get();
		$team = User_team::get();
		$access = array('STF' => 'Staff','MGR'=>'Manager','MGR.PAS'=>'Manager All Access', 'AGM' => 'Management','ADM' => 'Administrator');
		return view('contents.page_setting.form_create_user',compact('user', 'user_str','division','team','access'));
	}
	/* Tags:... */
	public function storeDataUser(Request $request)
	{
		$user = Auth::user();
		if ($request->access == 'STF') {
			$str_access = 'staff';
		} elseif($request->access == 'MGR' || $request->access == 'MGR.PAS' ){
			$str_access = 'manager';
		} elseif ($request->access == 'AGM') {
			$str_access = 'master';
		}else {
			$str_access = 'administrator';
		}
		if ($request->access == 'MGR' || $request->access == 'MGR.PAS') {
			$check_user_mgr = User_structure::where('usr_team_id',$request->team)->where('usr_str_level','manager')->first();
			if ($check_user_mgr != null) {
				$result = [
					'param'=>'manager_already',
				];
				return $result;
			}
		}
		$new_id_user = genIdUser();
		$data_user = [
			'id' => $new_id_user,
			'name' => $request->user_fullname,
			'username' => $request->username,
			'level' => $request->access,
			'image' =>$request->image,
			'password' => bcrypt($request->password),
			'email' => $request->email,
			'phone' => $request->mobile,
			'address' => $request->address,
			'created_by' => $user->id
		];
		User::insert($data_user);
		$data_usr_str = [
			'usr_user_id' => $new_id_user,
			'usr_division_id' => $request->division,
			'usr_team_id' => $request->team,
			'usr_str_level' => $str_access,
			'created_by' => $user->id
		];
		User_structure::insert($data_usr_str);
		$result = [
			'param'=>true,
		];
		return $result;
	}
	/* Tags:... */
	public function storeDataUpdateUser(Request $request)
	{
		$user = Auth::user();
		if ($request->access == 'STF') {
			$str_access = 'staff';
		} elseif($request->access == 'MGR' || $request->access == 'MGR.PAS' ){
			$str_access = 'manager';
		} elseif ($request->access == 'AGM') {
			$str_access = 'master';
		}else {
			$str_access = 'administrator';
		}
		$data_user = [
			'name' => $request->user_fullname,
			'username' => $request->username,
			'level' => $request->access,
			'image' =>$request->image,
			'password' => bcrypt($request->password),
			'email' => $request->email,
			'phone' => $request->mobile,
			'address' => $request->address,
			'created_by' => $user->id
		];
		
		$data_usr_str = [
			'usr_division_id' => $request->division,
			'usr_team_id' => $request->team,
			'usr_str_level' => $str_access,
			'created_by' => $user->id
		];
		if ($request->access == 'MGR' || $request->access == 'MGR.PAS') {
			$check_user_mgr = User_structure::where('usr_team_id',$request->team)->where('usr_str_level','manager')->first();
			if ($check_user_mgr != null) {
				#note : run when the team already manager user
				$result = [
					'param'=>'manager_already',
					'id_user' => $request->id
				];
				return $result;
			}else {
				#note : run wehen codition mgr mutation manager
				User_structure::where('usr_user_id',$request->id)->update($data_usr_str);
				User::where('id',$request->id)->update($data_user);
			}
		}else{
			User::where('id',$request->id)->update($data_user);
			User_structure::where('usr_user_id',$request->id)->update($data_usr_str);
		}
		$result = [
			'param'=>true,
			'id_user' => $request->id
		];
		return $result;
	}
	/* Tags:... */
	public function viewDevision(Request $request)
	{
		return view('contents.page_setting.all_devisions');
	}
	/* Tags:... */
	public function createDivision(Request $request)
	{
		$id_cst = $request->id;
		$user = Auth::user();
		return view('contents.page_setting.form_create_division',compact('user'));
	}
	/* Tags:... */
	public function updateDivision(Request $request)
	{
		$id_cst = $request->id;
		$user = Auth::user();
		$division = User_division::where('div_id',$request->id)->first();
		return view('contents.page_setting.form_update_division',compact('user','division'));
	}
	/* Tags:... */
	public function storeDataDivision(Request $request)
	{
		$user = Auth::user();
		$data = [
			'div_name' => $request->division,
			'created_by' => $user->id
		];
		User_division::insert($data);
		$result = [
			'param'=>true,
		];
		return $result;
	}
	/* Tags:... */
	public function storeDataUpdateDivision(Request $request)
	{
		$user = Auth::user();
		$data = [
			'div_name' => $request->division,
			'updated_by' => $user->id
		];
		User_division::where('div_id',$request->id_division)->update($data);
		$result = [
			'param'=>true,
		];
		return $result;
	}
	/* Tags:... */
	public function viewTeam(Request $request)
	{
		return view('contents.page_setting.all_team');
	}
	/* Tags:... */
	public function createTeam (Request $request)
	{
		$id_cst = $request->id;
		$user = Auth::user();
		$user_all = User::join('user_structures','users.id','=','user_structures.usr_user_id')->whereIn('usr_str_level',['staff','manager'])->get();
		$division = User_division::get();
		$user_str = User_structure::where('usr_user_id',$user->id)
		->get();
		$team = User_team::get();
		$access = array('STF' => 'Staff','MGR'=>'Manager','MGR.PAS'=>'Manager All Access', 'AGM' => 'Management','ADM' => 'Administrator');
		return view('contents.page_setting.form_create_team',compact('user','user_all','division'));
	}
	/* Tags:... */
	public function updateTeam(Request $request)
	{
		$id_team = $request->id;
		$user = Auth::user();
		$team = User_team::join('user_divisions','user_teams.uts_division','=','user_divisions.div_id')
		->where('uts_id',$request->id)
		->first();
		$check_structure = User_structure::where('usr_team_id',$id_team)->where('usr_str_level','manager')->select('usr_user_id')->first();
		if ($check_structure == null) {
			$id_mgr = null;
		} else {
			$id_mgr = $check_structure->usr_user_id;
		}
		$user_all = User::join('user_structures','users.id','=','user_structures.usr_user_id')->whereIn('usr_str_level',['staff','manager'])->get();
		$division = User_division::get();
		$user_str = User_structure::where('usr_user_id',$user->id)
		->get();
		$access = array('STF' => 'Staff','MGR'=>'Manager','MGR.PAS'=>'Manager All Access', 'AGM' => 'Management','ADM' => 'Administrator');
		return view('contents.page_setting.form_update_team',compact('user','user_all','division','team','id_mgr'));
	}
	/* Tags:... */
	public function storeDataTeam(Request $request)
	{
		$usr_structure = User_structure::where('usr_user_id',$request->team_manager)->update(['usr_str_level'=>'manager']);
		$user = User::where('id',$request->team_manager)->update(['level'=>'MGR']);
		$user = Auth::user();
		$data = [
			'uts_team_name' => $request->team,
			'uts_division' => $request->division,
			'created_by' => $user->id
		];
		User_team::insert($data);
		$result = [
			'param'=>true,
		];
		return $result;
	}
	/* Tags:... */
	public function storeUpdateDataTeam(Request $request)
	{
		$user = Auth::user();
		// $usr_structure = User_structure::where('usr_team_id',$request->id_team)
		// ->where('usr_str_level','manager')
		// ->first();
		// if ($request->team_manager == null) {
		// 	$result = [
		// 		'param'=>false,
		// 		'msg' => 'A team manager must be selected'
		// 	];
		// }else{ 
		// 	if ($usr_structure == null) {
		// 		User_structure::where('usr_user_id',$request->team_manager)->update(['usr_str_level'=>'manager']);
		// 		User::where('id',$request->team_manager)->update(['level'=>'MGR']);
		// 	}else{
		// 		if ($usr_structure->usr_user_id != $request->team_manager) {
		// 			User_structure::where('usr_user_id',$usr_structure->usr_user_id)->update(['usr_str_level'=>'staff']);
		// 			User_structure::where('usr_user_id',$request->team_manager)->update(['usr_str_level'=>'manager']);
		// 			User::where('id',$usr_structure->usr_user_id)->update(['level'=>'STF']);
		// 			User::where('id',$request->team_manager)->update(['level'=>'MGR']);
		// 		}
		// 	}
		// }
		$data_team = [
			'uts_team_name' => $request->team,
			'updated_by' => $user->id
		];
		// die();
		User_team::where('uts_id',$request->id_team)->update($data_team);
		$result = [
			'param'=>true,
		];
		return $result;
	}
	public function viewUserDataDetail(Request $request)
	{
		$init_user = User::where('id',$request->id)->first();
		return view('contents.content_i.user_set_detail_view',compact('init_user'));
	}
	public function InstansiDataView(Request $request)
	{
		return view('contents.content_i.instansi_set_view');
	}
}
