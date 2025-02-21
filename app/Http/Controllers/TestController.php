<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class TestController extends Controller
{
	public function viewHtml()
	{
		return view('test.tinymce');
	}
	/* Tags:... */
	public function authPush(Request $request)
	{
		$auth_data = [
			'email' => 'admin@webmaster.com',
			'password' => '123'
		];
		$web = 'http://192.168.101.201/appinformcert/api/auth_access_login';
		$response = Http::withHeaders(['Accept' => 'application/json'])->post($web, $auth_data);
		// $response = actionAuthApi($data);
		return $response;
		die();
		$token = $response['token'];
		$item = [
			'items' => [
				['name' => 'Produk A', 'value' => 1000],
				['name' => 'Produk B', 'value' => 2000]
			]
		];
		$response = Http::withHeaders(['Accept' => 'application/json', 'Authorization' => 'Bearer ' . $token])
		->post('http://127.0.0.1/appinformcert/api/data_general',$item);
		return response()->json([
			'status' => $response->status(),
			'body' => $response->json()
		]);
	}
}
