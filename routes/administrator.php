<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
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
	#TEST Modul
	# Admin 
	Route::prefix('test')->group(function (){
		Route::get('tinymce',[TestController::class,'viewHtml']);
	});
	######
	Route::prefix('files')->group(function () {
		Route::get('download_template_input_general/{id}', [DataController::class, 'downloadTemplateInput'])->name('download-template-input');
		Route::get('delete_template_input_general/{id}', [DataController::class, 'deleteTemplateInput'])->name('delete-template-input');

		Route::get('download_template_cert/{id}', [DataController::class, 'downloadTemplateCert'])->name('download-template-cert');
		Route::get('delete_template_cert/{id}', [DataController::class, 'deleteTemplateCert'])->name('delete-template-cert');
	});
	######
	Route::prefix('datasource')->group(function () {
		// Route::post('all-customer', [DataController::class, 'sourceDataCustomer'])->name('source-data-customer');
		Route::post('district', [DataController::class, 'sourceDataDistrict'])->name('source-data-district');
		Route::post('city', [DataController::class, 'sourceDataCities'])->name('source-data-city');
		Route::post('province', [DataController::class, 'sourceDataProvinces'])->name('source-data-province');
		#test & try
		Route::get('subdistrict', [DataController::class, 'sourceDataSubdistrict'])->name('source-data-subdistrict');
		#Main
		Route::post('source_data_customer', [DataController::class, 'sourceDataCustomer'])->name('source-data-customer');
		Route::post('source_data_gen_record', [DataController::class, 'sourceDataGenRecord'])->name('source-data-gen-record');
		
	});
	// Route::get('/', [HomeController::class, 'index']);
	Route::prefix('home')->group(function(){
		Route::get('/', [HomeController::class,'homeFunction']);
	});
	Route::prefix('generate')->group(function () {
		Route::get('/', [GenController::class, 'viewCustomer']);
		Route::get('create-customer', [GenController::class, 'viewAddCustomer']);
		Route::get('update-customer/{id}', [GenController::class, 'viewUpdateCustomer']);
		Route::get('customer_cert_generate/{id}', [GenController::class, 'viewCustomerCertGenerate']);
		Route::get('new_generate/{id}', [GenController::class, 'formGenerateCertificate']);
		Route::get('datalist_certificate/{cst_id}/{gen_id}', [GenController::class, 'viewDatalistCertificate'])->name('datalist-certificates');
	});
	Route::prefix('action')->group(function(){
		Route::post('action_generate_certificate',[GenController::class,'actionGenereteCertificate'])->name('action-generate-certificate');
		Route::post('action_store_customer', [GenController::class, 'actionStoreCustomer'])->name('action-store-customer');
		Route::post('action_update_customer', [GenController::class, 'actionUpdateCustomer'])->name('action-update-customer');
		Route::post('action_gen_template_certificate', [GenController::class, 'actionGenTemplateCert'])->name('action-gen-template-certificate');
	});
	Route::prefix('files')->group(function () {
		Route::post('gen_template_certificate', [GenController::class, 'actionGenTemplate'])->name('gen-template-certificate');
	});
});