<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Str;
use File;
use Arr;

class ActionController extends Controller
{
	public function storeUser(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'profile_photo' => 'mimes:jpg,png,jpeg|max:512|dimensions:min_width=100,min_height=100,max_width=450,max_height=450',
		],[
			'profile_photo.dimensions' => 'Dimensi gambar profil tidak boleh lebih dari 450*450 piksel dan tidak boleh kurang dari 100*100 piksel.',
			'profile_photo.max' => 'Ukuran berkas gambar tidak boleh lebih dari 512 kilobytes.',
			'profile_photo.mimes' => 'Format berkas hanya boleh .jpg .png .jpeg'
		]);
		$ck_data = array();
		if (User::where('username', $request->username )->exists()) {
			$ck_data[] = 'Nama pengguna tidak tersedia, harap gunakan nama pengguna lain.';
		}
		if (User::where('email', $request->email )->exists()) {
			$ck_data[] = 'Email sudah terdaftar di sistem, harap gunakan email lainnya.';
		}
		$err = array();
		$err = Arr::collapse([$validator->getMessageBag()->all(),$ck_data]);
		if (count($err) > 0) {
			$mssg = '<div class="alert bg-gradient-warning alert-dismissible mb-0" style="border:0px;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
			<ul style="list-style-type: square;padding-left: 17px;margin-bottom: 0px;">';
			foreach ($err as $key => $value) {
				$mssg .= '<li>'.$value.'</li>';
			}
			$mssg .= '</ul></div>';
			$res = [
				'param' => 0,
				'message' => $mssg
			];
			return $res;
		}else {
			$data = [
				'name' => $request->fullname,
				'username' => $request->username,
				'level' => $request->accesslevel,
				'email' => $request->email,
				'phone' => $request->phone,
				'address' => $request->address,
				'password' => Hash::make($request->password)
			];
			if ($request->file('profile_photo') != null) {
				$newname_profile_img = 'img_profile_'.Str::random(10).'.'.$request->profile_photo->getClientOriginalExtension();
				$request->file('profile_photo')->move(storage_path('app/public/img_profile/'),$newname_profile_img);
				$data = Arr::add($data, 'image', $newname_profile_img);
			}
			$act_store = User::insert($data);
			$res = [
				'param' => 1,
				'message' => 'ok'
			];
			return $res;
		}
	}
	public function storeUpdateUser(Request $request)
	{
		$init = User::where('id',$request->init)->first();
		$validator = Validator::make($request->all(), [
			'profile_photo' => 'mimes:jpg,png,jpeg|max:512|dimensions:min_width=100,min_height=100,max_width=450,max_height=450',
		],[
			'profile_photo.dimensions' => 'Dimensi gambar profil tidak boleh lebih dari 450*450 piksel dan tidak boleh kurang dari 100*100 piksel.',
			'profile_photo.max' => 'Ukuran berkas gambar tidak boleh lebih dari 512 kilobytes.',
			'profile_photo.mimes' => 'Format berkas hanya boleh .jpg .png .jpeg'
		]);
		$ck_data = array();
		if ($init->username != $request->username) {
			if (User::where('username', $request->username )->exists()) {
				$ck_data[] = 'Nama pengguna tidak tersedia, harap gunakan nama pengguna lain.';
			}
		}
		if ($init->email != $request->email) {
			if (User::where('email', $request->email )->exists()) {
				$ck_data[] = 'Email sudah terdaftar di sistem, harap gunakan email lainnya.';
			}
		}
		$err = array();
		$err = Arr::collapse([$validator->getMessageBag()->all(),$ck_data]);
		if (count($err) > 0) {
			$mssg = '<div class="alert bg-gradient-warning alert-dismissible mb-0" style="border:0px;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
			<ul style="list-style-type: square;padding-left: 17px;margin-bottom: 0px;">';
			foreach ($err as $key => $value) {
				$mssg .= '<li>'.$value.'</li>';
			}
			$mssg .= '</ul></div>';
			$res = [
				'param' => 0,
				'message' => $mssg
			];
			return $res;
		}else {
			$data = [
				'name' => $request->fullname,
				'username' => $request->username,
				'level' => $request->accesslevel,
				'email' => $request->email,
				'phone' => $request->phone,
				'address' => $request->address,
			];
			if ($request->param_profile_img == 'CHANGE') {
				$newname_profile_img = 'img_profile_'.Str::random(10).'.'.$request->profile_photo->getClientOriginalExtension();
				$request->file('profile_photo')->move(storage_path('app/public/img_profile/'),$newname_profile_img);
				File::delete(storage_path('app/public/img_profile/'.$init->image));
				$data = Arr::add($data, 'image', $newname_profile_img);
			}elseif($request->param_profile_img == 'REMOVE'){
				File::delete(storage_path('app/public/img_profile/'.$init->image));
				$data = Arr::add($data, 'image', null);
			}
			if ($request->password != null) {
				$data = Arr::add($data, 'password', Hash::make($request->password));
			}
			$action_update = User::where('id',$init->id)->update($data);
			$res = [
				'param' => 1,
				'message' => 'ok'
			];
			return $res;
		}
	}
	public function deleteUser(Request $request)
	{
		$init = User::where('id',$request->init)->first();
		if ($init->image != null) {
			File::delete(storage_path('app/public/img_profile/'.$init->image));
		}
		$act_delete = User::where('id',$request->init)->delete();
		if ($act_delete == false) {
			$mssg = '<div class="alert bg-gradient-warning alert-dismissible mb-0" style="border:0px;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
			Gagal menghapus data user.
			</div>';
			$res = [
				'param' => 0,
				'message' => $mssg
			];
			return $res;
		}else {
			$res = [
				'param' => 1,
				'message' => 'ok'
			];
			return $res;
		}
	}

	/* Tags:... */
	public function viewTicketActivity()
	{
		#code...
	}
}

