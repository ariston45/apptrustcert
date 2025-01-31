<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
	# Admin
	Route::group(['middleware' => ['rulesystem:ADM']], function () {
		// Route::post('source-data-user', [DataController::class, 'sourceDataUser'])->name('source-data-user');
		// Route::post('source-data-customer', [DataController::class, 'sourceDataCustomer'])->name('source-data-customer');
		// Route::match(['get', 'post'], 'source-data-customer', [DataController::class, 'sourceDataCustomer'])->name('source-data-customer');
		
	});
});
