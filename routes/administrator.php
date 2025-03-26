<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SettingController;
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
	Route::prefix('api-auth')->group(function () {
		Route::get('/login', [TestController::class, 'authPush']);
		Route::get('/logout', [TestController::class, 'authPush']);
	});
	######
	Route::prefix('push')->group(function () {
		Route::post('push-data-online-gold-silver', [DataController::class, 'pushDataOnlineGoldSilver'])->name('action_push_online_gold_silver');
		Route::post('push-data-online', [DataController::class, 'pushDataOnline'])->name('action_push_online');
	});
	######
	Route::prefix('files')->group(function () {
		Route::get('download_template_input_general/{id}', [DataController::class, 'downloadTemplateInput'])->name('download-template-input');
		Route::get('delete_template_input_general/{id}', [DataController::class, 'deleteTemplateInput'])->name('delete-template-input');
		Route::get('download_template_cert/{id}', [DataController::class, 'downloadTemplateCert'])->name('download-template-cert');
		Route::get('download_template_cert_scd/{id}', [DataController::class, 'downloadTemplateCertScd'])->name('download-template-cert-scd');
		Route::get('delete_template_cert/{id}', [DataController::class, 'deleteTemplateCert'])->name('delete-template-cert');
		Route::get('delete_template_cert_scd/{id}', [DataController::class, 'deleteTemplateCertScd'])->name('delete-template-cert-scd');
		Route::get('download_temp_file_1/{id}', [DataController::class, 'downloadTmpFile1'])->name('download-temp-file-1');
		Route::get('download_temp_file_2/{id}', [DataController::class, 'downloadTmpFile2'])->name('download-temp-file-2');
		Route::get('delete_temp_file_1/{id}', [DataController::class, 'deleteTemplateCert1'])->name('delete-temp-file-1');
		Route::get('delete_temp_file_2/{id}', [DataController::class, 'deleteTemplateCert2'])->name('delete-temp-file-2');
	});
	######
	Route::prefix('datasource')->group(function () {
		#Main
		Route::post('source_data_customer', [DataController::class, 'sourceDataCustomer'])->name('source-data-customer');
		Route::post('source_data_gen_record', [DataController::class, 'sourceDataGenRecord'])->name('source-data-gen-record');
		Route::post('source_data_participant', [DataController::class, 'sourceDataParticipant'])->name('source-data-participant');
		// Route::post('all-customer', [DataController::class, 'sourceDataCustomer'])->name('source-data-customer');
		Route::post('cert', [DataController::class, 'sourceCert'])->name('source-data-cert');

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
		Route::get('customer_cert_template/{id}', [GenController::class, 'viewCustomerCertTemplate']);
		Route::get('add_cert_template/{id}', [GenController::class, 'formAddTemplate']);
		Route::get('update_cert_template/{id}/{id_cert}', [GenController::class, 'formUpdateTemplate']);
		Route::get('delete_cert_template/{id}/{id_cert}', [GenController::class, 'deleteTemplate']);
		Route::get('new_generate/{id}', [GenController::class, 'formGenerateCertificate']);
		Route::get('datalist_certificate/{cst_id}/{gen_id}', [GenController::class, 'viewDatalistCertificate'])->name('datalist-certificates');
	});
	Route::prefix('action')->group(function(){
		Route::post('action_generate_certificate',[GenController::class,'actionGenereteCertificate'])->name('action-generate-certificate');
		Route::post('action_generate_certificate_new', [GenController::class, 'actionGenereteCertificateNew'])->name('action-generate-certificate-new');
		Route::post('action_store_customer', [GenController::class, 'actionStoreCustomer'])->name('action-store-customer');
		Route::post('action_update_customer', [GenController::class, 'actionUpdateCustomer'])->name('action-update-customer');
		Route::post('action_store_template', [GenController::class, 'actionStoreTemplate'])->name('action-store-template');
		Route::post('action_update_template', [GenController::class, 'actionUpdateTemplate'])->name('action-update-template');
		Route::post('action_update_participants', [GenController::class, 'actionUpdateParticipant'])->name('action-update-participants');
    Route::post('action_update_record', [GenController::class, 'actionUpdateRecord'])->name('action-update-record');
		####
		Route::post('action_tmp_certificate', [GenController::class, 'actionGenTemplateCert'])->name('tmp_certificate');
		Route::post('action_tmp_cert_front', [GenController::class, 'actionGenTemplateFront'])->name('tmp_cert_front');
		// Route::post('action_tmp_cert_front', [GenController::class, 'actionGenTemplateFrontWord'])->name('tmp_cert_front');
		Route::get('action_tmp_cert_front_word', [GenController::class, 'actionGenTemplateFrontWord']);
		Route::post('action_tmp_cert_barcode', [GenController::class, 'actionGenTemplateBarcode'])->name('tmp_cert_barcode');
		// Route::post('action_tmp_cert_back_word', [GenController::class, 'actionGenTemplateBackWord'])->name('tmp_cert_back_word');
		Route::post('action_tmp_cert_gold_silver', [GenController::class, 'actionGenTemplateCertGoldSilver'])->name('tmp_cert_gold_silver');
		// Route::post('action_tmp_cert_silver', [GenController::class, 'actionGenTemplateCertSilver'])->name('tmp_cert_silver');
	});
	Route::prefix('files')->group(function () {
		Route::post('gen_template_certificate', [GenController::class, 'actionGenTemplate'])->name('gen-template-certificate');
	});
	Route::prefix('setting')->group(function () {
		Route::get('certificate', [SettingController::class, 'viewSetting']);
		Route::get('certificate/add-cetificate', [SettingController::class, 'formAddCert']);
		Route::get('certificate/sync', [DataController::class, 'pushSettindCertOnline']);
		Route::post('action_store_cert',[SettingController::class, 'actionAddCert'])->name('action-store-cert');
		Route::get('certificate/update-cetificate/{id}', [SettingController::class, 'formUpdateCert']);
		Route::post('action_update_cert', [SettingController::class, 'actionUpdateCert'])->name('action-update-cert');
		Route::get('action_delete_cert/{id}', [SettingController::class, 'actionDeleteCert'])->name('action-delete-cert');
	});
});
