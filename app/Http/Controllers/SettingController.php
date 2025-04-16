<?php

namespace App\Http\Controllers;

use App\Models\Cert_category;
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
	public function viewSetting(Request $request)
	{
		return view('contents.page_setting.home');
	}
  public function viewUser(Request $request)
  {
    return view('contents.page_setting.user');
  }
	/* Tags:... */
	public function formAddCert(Request $request)
	{
		$user = Auth::user();
		$users = User::get();
		return view('contents.page_setting.form_add_cert', compact('user'));
	}
  function formAddUser(Request $request)
  {
    $user = Auth::user();
    $users = User::get();
    return view('contents.page_setting.form_add_user', compact('user'));
  }
  public function actionAddUser(Request $request)
  {
    $user = Auth::user();
    $mxid = User::max('id');
    $id = $mxid + 1;
    if ($request->confirm_password != null) {
      if ($request->confirm_password == $request->password) {
        # code...
        $data = [
          'id' => $id,
          'name' => $request->name,
          'username' => $request->username,
          'email' => $request->email,
          'level' => $request->level,
          'password' => bcrypt($request->confirm_password),
          'created_by' => $user->id,
        ];
      }else {
        return redirect()->to(url('setting/user/add-user'))->with('password_mismatch', 'Password tidak sama');
      }
      User::insert($data);
      return redirect()->to(url('setting/user'))->with('success', 'Data berhasil diupdate');
    }
  }
	/* Tags:... */
	public function actionAddCert(Request $request)
	{
		$user = Auth::user();
		$id = genIdCert();
		$data = [
			'cert_id' => $id,
			'cert_type' => $request->cert_type,
			'cert_title' => $request->cert_title,
			'created_by' => $user->id,
		];
		Cert_category::insert($data);
		return redirect()->to(url('setting/certificate'));
	}
	public function formUpdateCert(Request $request)
	{
		$user = Auth::user();
		$users = User::get();
		$data = Cert_category::where('cert_id',$request->id)->first();
		return view('contents.page_setting.form_update_cert', compact('user','data'));
	}
  public function formUpdateUser(Request $request)
  {
    $user = User::where('id', '=', $request->id)->first();
    $data = Cert_category::where('cert_id', $request->id)->first();
    return view('contents.page_setting.form_update_user', compact('user', 'data'));
  }
	public function actionUpdateCert(Request $request)
	{
		$user = Auth::user();
		$id = $request->cert_id;
		$data = [
			'cert_type' => $request->cert_type,
			'cert_title' => $request->cert_title,
			'updated_by' => $user->id,
		];
		Cert_category::where('cert_id',$id)->update($data);
		return redirect()->to(url('setting/certificate'));
	}
  public function actionUpdateUser(Request $request)
  {
    $user = Auth::user();
    $id = $request->id;
    if (!$request->confirm_password) {
      $data = [
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'level' => $request->level,
        'updated_by' => $user->id,
      ];
    }else{
      if ($request->confirm_password != $request->password) {
        return redirect()->to(url('setting/user/update-user/'.$id))->with('password_mismatch', 'Password tidak sama');
      }else{
        $data = [
          'name' => $request->name,
          'username' => $request->username,
          'email' => $request->email,
          'level' => $request->level,
          'password' => bcrypt($request->confirm_password),
          'updated_by' => $user->id,
        ];
      }
    }
    User::where('id', $id)->update($data);
    return redirect()->to(url('setting/user/update-user/'.$id))->with('success', 'Data berhasil diupdate');
  }
	public function actionDeleteCert(Request $request)
	{
		$id = $request->id;
		Cert_category::where('cert_id', $id)->delete();
		return redirect()->to(url('setting/certificate'));
	}
	public function sourceDataUser(Request $request)
	{
		$colect_data = User::join('users','user_structures.usr_user_id','=','users.id')
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
	#user #view_user
	public function UserDataView()
	{
		return view('contents.page_setting.all_users');
	}
	/* Tags:... */

}
