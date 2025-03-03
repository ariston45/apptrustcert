<?php

namespace App\Http\Controllers;

use PDF;
use Str;
use Auth;
use DNS2D;
use Storage;
use File;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Setup_web;
use App\Models\Cst_customer;
use Illuminate\Http\Request;
use App\Models\Rec_gen_record;
use App\Models\Par_participant;
use PhpOffice\PhpSpreadsheet\IOFactory as SpreadsheetIOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;
use PhpOffice\PhpWord\Style\Table;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\Style\Font;
use Dompdf\Dompdf;
// use PhpOption\None;

class GenController extends Controller
{
	/* Tags:... */
	public function viewCustomer(Request $request)
	{
		$user = Auth::user();
		$users = User::get();
		return view('contents.page_generate.customer', compact('user'));
	}
	public function viewAddCustomer(Request $request)
	{
		$user = Auth::user();
		$users = User::get();
		return view('contents.page_generate.form_add_customer', compact('user'));
	}
	public function viewUpdateCustomer(Request $request)
	{
		$user = Auth::user();
		$users = User::get();
		$customer = Cst_customer::where('cst_id',$request->id)->first();
		return view('contents.page_generate.form_update_customer', compact('user', 'customer'));
	}
	/* Tags:... */
	public function viewCustomerCertGenerate(Request $request)
	{
		$id = $request->id;
		$user = Auth::user();
		$customer = Cst_customer::where('cst_id',$id)
		->first();
		return view('contents.page_generate.customer_cert_generate', compact('user','customer'));
	}
	/* Tags:... */
	public function formGenerateCertificate(Request $request)
	{
		$id = $request->id;
		$user = Auth::user();
		$customer = Cst_customer::where('cst_id', $id)
		->first();
		if ($customer->cst_sts_custom_certificate == 'GOLD_SILVER') {
			return view('contents.page_generate.form_customer_cert_generate_gold_silver', compact('user', 'customer'));
		}else {
			return view('contents.page_generate.form_customer_cert_generate', compact('user', 'customer'));
		}
	}
	/* Tags:... */
	public function actionStoreCustomer(Request $request)
	{
		$request->validate(
			[
				'file_upload_temp_cert' => 'required|file|mimes:jpg,jpeg,png|max:2024',
				'file_upload_temp_input' => 'file|mimes:xls,xlsx|max:2024'
			],
			[
				'file_upload_temp_cert.required' => 'Input file harus diisi.',
				'file_upload_temp_cert.mimes' => 'File harus dalam format .jpg .jpeg .png',
				'file_upload_temp_cert.max' => 'Ukuran file maksimal 1 Mb.',
				'file_upload_temp_input.mimes' => 'File harus dalam format .xls .xlsx',
				'file_upload_temp_input.max' => 'Ukuran file maksimal 1 Mb.',
			]
		);
		$id = getIdCustomer();
		$fileName_CertFile = null;
		$fileName_CertFile_scd = null;
		$fileName_InputFile = null;
		$cst_sts_custom_input = 'false';
		if ($request->hasFile('file_upload_temp_cert')) {
			$file = $request->file('file_upload_temp_cert');
			$fileName_CertFile = Str::uuid(). '.' . $file->extension();
			$path = $file->storeAs('file_uploaded', $fileName_CertFile, 'public'); 
		}
		if ($request->hasFile('file_upload_temp_cert_scd')) {
			$file = $request->file('file_upload_temp_cert_scd');
			$fileName_CertFile_scd = Str::uuid() . '.' . $file->extension();
			$path = $file->storeAs('file_uploaded', $fileName_CertFile_scd, 'public');
		}else{
			$fileName_CertFile_scd = null;
		}
		if ($request->hasFile('file_upload_temp_input')) {
			$file = $request->file('file_upload_temp_input');
			$fileName_InputFile = Str::uuid() . '.' . $file->extension();
			$path = $file->storeAs('file_uploaded', $fileName_InputFile, 'public');
			$cst_sts_custom_input = 'true';
		}
		$data_cst = [
			'cst_id' => $id,
			'cst_name' => $request->inp_name,
			'cst_address' => $request->inp_address,
			'cst_email' => $request->inp_email,
			'cst_phone' => $request->inp_phone,
			'cst_sts_custom_input' => $cst_sts_custom_input,
			'cst_file_custom_input' => $fileName_InputFile,
			'cst_sts_custom_certificate' => $request->certificate_type,
			'cst_file_custom_certificate' => $fileName_CertFile,
			'cst_file_custom_certificate_scd' => $fileName_CertFile_scd
		];
		Cst_customer::insert($data_cst);
		return redirect()->to(url('generate'));
	}
	public function actionUpdateCustomer(Request $request)
	{
		$request->validate(
			[
				'file_upload_temp_cert' => 'file|mimes:jpg,jpeg,png|max:2024',
				'file_upload_temp_input' => 'file|mimes:xls,xlsx|max:2024'
			],
			[
				'file_upload_temp_cert.mimes' => 'File harus dalam format .jpg .jpeg .png',
				'file_upload_temp_cert.max' => 'Ukuran file maksimal 2 Mb.',
				'file_upload_temp_input.mimes' => 'File harus dalam format .xls .xlsx',
				'file_upload_temp_input.max' => 'Ukuran file maksimal 2 Mb.',
			]
		);
		$id = $request->cst_id;
		$customer = Cst_customer::where('cst_id',$id)->first();
		if ($request->hasFile('file_upload_temp_cert')) {
			$file = $request->file('file_upload_temp_cert');
			$fileName_CertFile = Str::uuid() . '.' . $file->extension();
			$file->storeAs('file_uploaded', $fileName_CertFile, 'public');
			#check file exist
			$path = 'public/file_uploaded/' . $customer->cst_file_custom_certificate;
			if (Storage::exists($path)) {
				Storage::delete($path);
			}
		}else{
			$fileName_CertFile = $customer->cst_file_custom_certificate;
		}
		if ($request->hasFile('file_upload_temp_cert_scd')) {
			$file = $request->file('file_upload_temp_cert_scd');
			$fileName_CertFile_scd = Str::uuid() . '.' . $file->extension();
			$file->storeAs('file_uploaded', $fileName_CertFile_scd, 'public');
			#check file exist
			$path = 'public/file_uploaded/' . $customer->cst_file_custom_certificate_scd;
			if (Storage::exists($path)) {
				Storage::delete($path);
			}
		} else {
			$fileName_CertFile_scd = $customer->cst_file_custom_certificate_scd;
		}
		if ($request->hasFile('file_upload_temp_input')) {
			$file = $request->file('file_upload_temp_input');
			$fileName_InputFile = Str::uuid() . '.' . $file->extension();
			$file->storeAs('file_uploaded', $fileName_InputFile, 'public');
			$cst_sts_custom_input = 'true';
			#check file exist
			$path = 'public/file_uploaded/' . $customer->cst_file_custom_input;
			if (Storage::exists($path)) {
				Storage::delete($path);
			}
		}else{
			$cst_sts_custom_input = $customer->cst_sts_custom_input;
			$fileName_InputFile = $customer->cst_file_custom_input;
		}
		$data_cst = [
			'cst_name' => $request->inp_name,
			'cst_address' => $request->inp_address,
			'cst_email' => $request->inp_email,
			'cst_phone' => $request->inp_phone,
			'cst_sts_custom_input' => $cst_sts_custom_input,
			'cst_file_custom_input' => $fileName_InputFile,
			'cst_sts_custom_certificate' => $request->certificate_type,
			'cst_file_custom_certificate' => $fileName_CertFile,
			'cst_file_custom_certificate_scd' => $fileName_CertFile_scd
		];
		Cst_customer::where('cst_id',$id)->update($data_cst);
		return redirect()->to(url('generate/update-customer/'.$id));
	}
	/* Tags:... */
	public function actionGenereteCertificate(Request $request)
	{
		$id = $request->id;
		$user = Auth::user();
		$customer = Cst_customer::where('cst_id',$id)->first();
		$id_record = genIdRecord();
		$date = date('Y-m-d');
		switch ($customer->cst_sts_custom_certificate) {
			case 'GENERAL':
				$par_id = genIdParticipant();
				$request->validate(
					[
						'file_upload' => 'required|file|mimes:xlsx,xls'
					],
					[
						'file_upload.required' => 'Input file harus diisi.',
						'file_upload.mimes' => 'File harus dalam format .xlsx atu .xls.'
					]
				);
				$file = $request->file('file_upload');
				$spreadsheet = SpreadsheetIOFactory::load($file->getRealPath());
				$sheet = $spreadsheet->getActiveSheet();
				$dataColect = $sheet->toArray();
				$dataWithoutHeader = array_slice($dataColect, 1);
				foreach ($dataWithoutHeader as $key => $value) {
					$data[$key] = [
						'par_id' => $par_id,
						'par_customer_id' => $id,
						'par_rec_id' => $id_record,
						'par_cert_number' => $value[3],
						'par_name' => Str::upper($value[1]),
						'par_exam_date' => date('Y-m-d', strtotime($value[2])),
						'par_type' => 'GENERAL',
						'par_hash_id' => Str::random(64),
						'par_val_word' => $value[4],
						'par_val_excel' => $value[5],
						'par_val_powerpoint' => $value[6],
						'created_by' => $user->d,
					];
					$par_id++;
				}
				$data_record = [
					'rec_id' => $id_record,
					'rec_customer_id' => $customer->cst_id,
					'rec_date' => $date,
					'rec_sync_date' => null,
					'rec_name' =>$request->name,
					'rec_note' => $request->note,
					'rec_count' => count($data),
					'created_by' => $user->d,
				];
				Rec_gen_record::insert($data_record);
				Par_participant::insert($data);
				return redirect()->route('datalist-certificates', ['cst_id' => $customer->cst_id,'gen_id' => $id_record]);
				// 
				// break;
				##############################################################################################################################################################
			case 'GOLD_SILVER':
				$request->validate(
					[
						'file_upload_gold' => 'required|file|mimes:xlsx,xls',
						'file_upload_silver' => 'required|file|mimes:xlsx,xls'
					],
					[
						'file_upload_gold.required' => 'Input file harus diisi.',
						'file_upload_gold.mimes' => 'File harus dalam format .xlsx atu .xls.',
						'file_upload_silver.required' => 'Input file harus diisi.',
						'file_upload_silver.mimes' => 'File harus dalam format .xlsx atu .xls.',
						]
					);
					if ($request->hasFile('file_upload_gold')) {
						# code...
						$par_id = genIdParticipant();
						$file_gold = $request->file('file_upload_gold');
						$spreadsheet_gold = SpreadsheetIOFactory::load($file_gold->getRealPath());
						$sheet_gold = $spreadsheet_gold->getActiveSheet();
						$dataColect_gold = $sheet_gold->toArray();
						$dataWithoutHeader_gold = array_slice($dataColect_gold, 1);
						foreach ($dataWithoutHeader_gold as $key => $value) {
							$data_gold[$key] = [
								'par_id' => $par_id,
								'par_customer_id' => $id,
								'par_rec_id' => $id_record,
								'par_cert_number' => $value[3],
								'par_name' => Str::upper($value[1]),
								'par_exam_date' => date('Y-m-d', strtotime($value[2])),
								'par_type' => 'GOLD',
								'par_hash_id' => Str::random(64),
								'par_val_word' => $value[4],
								'par_val_excel' => $value[5],
								'par_val_powerpoint' => $value[6],
								'created_by' => $user->d,
							];
							$par_id++;
					}
					Par_participant::insert($data_gold);
				}
				if ($request->hasFile('file_upload_silver')) {
					# code...
					$par_id = genIdParticipant();
					$file_silver = $request->file('file_upload_silver');
					$spreadsheet_silver = SpreadsheetIOFactory::load($file_silver->getRealPath());
					$sheet_silver = $spreadsheet_silver->getActiveSheet();
					$dataColect_silver = $sheet_silver->toArray();
					$dataWithoutHeader_silver = array_slice($dataColect_silver, 1);
					foreach ($dataWithoutHeader_silver as $key => $value) {
						$data_silver[$key] = [
							'par_id' => $par_id,
							'par_customer_id' => $id,
							'par_rec_id' => $id_record,
							'par_cert_number' => $value[3],
							'par_name' => Str::upper($value[1]),
							'par_exam_date' => date('Y-m-d', strtotime($value[2])),
							'par_type' => 'SILVER',
							'par_hash_id' => Str::random(64),
							'par_val_word' => $value[4],
							'par_val_excel' => $value[5],
							'par_val_powerpoint' => $value[6],
							'created_by' => $user->d,
						];
						$par_id++;
					}
					Par_participant::insert($data_silver);
				}
				$c_gold_silver = count($data_gold) + count($data_silver);
				$data_record = [
					'rec_id' => $id_record,
					'rec_customer_id' => $customer->cst_id,
					'rec_date' => $date,
					'rec_sync_date' => null,
					'rec_name' => $request->name,
					'rec_note' => $request->note,
					'rec_count' => $c_gold_silver,
					'created_by' => $user->d,
				];
				Rec_gen_record::insert($data_record);
				return redirect()->route('datalist-certificates', ['cst_id' => $customer->cst_id, 'gen_id' => $id_record]);
				##############################################################################################################################################################
			case 'STAMP_COPY':
				$par_id = genIdParticipant();
				$request->validate(
					[
						'file_upload' => 'required|file|mimes:xlsx,xls'
					],
					[
						'file_upload.required' => 'Input file harus diisi.',
						'file_upload.mimes' => 'File harus dalam format .xlsx atu .xls.'
					]
				);
				$file = $request->file('file_upload');
				$spreadsheet = SpreadsheetIOFactory::load($file->getRealPath());
				$sheet = $spreadsheet->getActiveSheet();
				$dataColect = $sheet->toArray();
				$dataWithoutHeader = array_slice($dataColect, 1);
				foreach ($dataWithoutHeader as $key => $value) {
					$data[$key] = [
						'par_id' => $par_id,
						'par_customer_id' => $id,
						'par_rec_id' => $id_record,
						'par_cert_number' => $value[3],
						'par_name' => Str::upper($value[1]),
						'par_exam_date' => date('Y-m-d', strtotime($value[2])),
						'par_type' => 'STAMP',
						'par_hash_id' => Str::random(64),
						'par_val_word' => $value[4],
						'par_val_excel' => $value[5],
						'par_val_powerpoint' => $value[6],
						'created_by' => $user->d,
					];
					$par_id++;
				}
				$data_record = [
					'rec_id' => $id_record,
					'rec_customer_id' => $customer->cst_id,
					'rec_date' => $date,
					'rec_sync_date' => null,
					'rec_name' => $request->name,
					'rec_note' => $request->note,
					'rec_count' => count($data),
					'created_by' => $user->d,
				];
				Rec_gen_record::insert($data_record);
				Par_participant::insert($data);
				return redirect()->route('datalist-certificates', ['cst_id' => $customer->cst_id, 'gen_id' => $id_record]);
			##############################################################################################################################################################
			default:
				# code...
				break;
		}
	}
	/* Tags:... */
	public function viewDatalistCertificate(Request $request)
	{
		$cst_id = $request->cst_id;
		$gen_id = $request->gen_id;
		$user = Auth::user();
		$data_record = Rec_gen_record::where('rec_id',$gen_id)->first();
		$data_list_certificate = Par_participant::where('par_rec_id', $gen_id)
		->get();
		$customer = Cst_customer::where('cst_id', $cst_id)
		->first();
		# Clean tmp generate cert
		$folderPath_a = public_path('barcodes');
		$folderPath_b = public_path('trust_certificates');
		if (File::exists($folderPath_a)) {
			File::cleanDirectory($folderPath_a); 
		}
		if (File::exists($folderPath_b)) {
			File::cleanDirectory($folderPath_b);
		}
		#
		if ($customer->cst_sts_custom_certificate == 'GOLD_SILVER') {
			# code...
			$gen_filename = Str::slug(Str::lower($data_record->rec_name));
			$gen_filename_gold = 'Gold_'. $gen_filename;
			$gen_filename_silver = 'Silver_' . $gen_filename;
			$dataList_gold = [];
			$dataList_silver = [];
			foreach ($data_list_certificate as $key => $value) {
				if ($value->par_type == 'GOLD') {
					# code...
					$dataList_gold[$key] = [
						'par_id' => $value->par_id,
						'par_customer_id' => $value->par_customer_id,
						'par_rec_id' => $value->par_rec_id,
						'par_cert_number' => $value->par_cert_number,
						'par_name' => $value->par_name,
						'par_exam_date' => date('F d, Y', strtotime($value->par_exam_date)),
						'par_exam_date_raw' => $value->par_exam_date,
						'par_hash_id' => $value->par_hash_id,
						'par_type' => $value->par_type,
						'par_val_word' => $value->par_val_word,
						'par_val_excel' => $value->par_val_excel,
						'par_val_powerpoint' => $value->par_val_powerpoint,
					];
				}else if($value->par_type == 'SILVER'){
					$dataList_silver[$key] = [
						'par_id' => $value->par_id,
						'par_customer_id' => $value->par_customer_id,
						'par_rec_id' => $value->par_rec_id,
						'par_cert_number' => $value->par_cert_number,
						'par_name' => $value->par_name,
						'par_exam_date' => date('F d, Y', strtotime($value->par_exam_date)),
						'par_exam_date_raw' => $value->par_exam_date,
						'par_hash_id' => $value->par_hash_id,
						'par_type' => $value->par_type,
						'par_val_word' => $value->par_val_word,
						'par_val_excel' => $value->par_val_excel,
						'par_val_powerpoint' => $value->par_val_powerpoint,
					];
				}
			}
			$dataRecord = json_encode($data_record);
			$dataJsonCustomer = json_encode($customer);
			$dataJsonGold = json_encode($dataList_gold);
			$dataJsonSilver = json_encode($dataList_silver);
			return view('contents.page_generate.cert_data_result_for_gold_silver', 
			compact('user', 'gen_id', 'customer', 'dataJsonGold', 'dataJsonSilver', 'dataList_gold', 'dataList_silver', 'gen_filename_gold', 'gen_filename_silver', 'dataJsonCustomer', 'data_record', 'dataRecord'));
		} else {
			# code...
			$gen_filename = Str::slug(Str::lower($data_record->rec_name));
			foreach ($data_list_certificate as $key => $value) {
				$dataList[$key] = [
					'par_id' => $value->par_id,
					'par_customer_id' => $value->par_customer_id,
					'par_rec_id' => $value->par_rec_id,
					'par_cert_number' => $value->par_cert_number,
					'par_name' => $value->par_name,
					'par_exam_date' => date('F d, Y', strtotime($value->par_exam_date)),
					'par_exam_date_raw' => $value->par_exam_date,
					'par_hash_id' => $value->par_hash_id,
					'par_type' => $value->par_type,
					'par_val_word' => $value->par_val_word,
					'par_val_excel' => $value->par_val_excel,
					'par_val_powerpoint' => $value->par_val_powerpoint,
				];
			}
			$dataRecord = json_encode($data_record);
			$dataJsonCustomer = json_encode($customer);
			$dataJson = json_encode($dataList);
			return view('contents.page_generate.cert_data_result', 
			compact('user', 'gen_id', 'customer', 'dataJson', 'dataList', 'gen_filename', 'dataJsonCustomer', 'data_record', 'dataRecord'));
		}
	}
	/* Tags:... */
	public function actionUpdateParticipant(Request $request)
	{
		$id = $request->id;
		$data = [
			'par_name' => $request->name,
			'par_cert_number' => $request->number,
			'par_exam_date' => $request->date,
			'par_val_word' => $request->word,
			'par_val_excel' => $request->excel,
			'par_val_powerpoint' => $request->powerpoint,
		];
		Par_participant::where('par_id',$id)->update($data);
		return redirect()->back();
	}
	/* Tags:... */
	public function actionGenTemplateCert(Request $request)
	{
		$data = $request->dataJson;
		$dataAr = json_decode($data);
		$pages = [];
		$filename = date('Y-m-d_h-i-s').'_'.$request->gen_filename.'.pdf';
		$primary_domain = Setup_web::where('sw_id','1')->first();
		$cert_url = url('storage/file_uploaded/'.$request->tmp_cert);
		// echo $cert_url;
		// die();
		$cert_value_url = url('storage/static/tmp_value.jpg');
		if ($request->param_cert == 'GENERAL') {
			# code...
			foreach ($dataAr as $key => $value) {
				$web = $primary_domain->sw_name . '/' . 'digital-transcript' . '/' . $value->par_hash_id;
				$barcode = DNS2D::getBarcodePNG($web, 'QRCODE',2.5,2.5); // Barcode Code39
				$pages[] = [
					'page_number' => $key,
					'barcode' => $barcode,
					'cert_url' => $cert_url,
					'cert_value_url' => $cert_value_url,
					'cert_name' => $value->par_name,
					'cert_date' => $value->par_exam_date,
					'cert_number' => $value->par_cert_number,
					'val_word' => $value->par_val_word,
					'val_excel' => $value->par_val_excel,
					'val_powerpoint' => $value->par_val_powerpoint,
				];
			}
			// return view('contents.page_generate.file_gen_cer_template', compact('pages'));
			$pdf = PDF::loadView('contents.page_generate.file_gen_cer_template', ['pages' => $pages])
				->setPaper('a4', 'landscape');
			return $pdf->download($filename);
		}elseif ($request->param_cert == 'STAMP_COPY') {
			Carbon::setLocale('id');
			foreach ($dataAr as $key => $value) {
				$date_id[$key] = $value->par_exam_date_raw;
				$carbonDate[$key] = Carbon::parse($date_id[$key]);
				$localDate[$key] = $carbonDate[$key]->translatedFormat('d F Y');
				$web = $primary_domain->sw_name . '/'.'digital-transcript'.'/' . $value->par_hash_id;
				$barcode = DNS2D::getBarcodePNG($web,'QRCODE', 2.5, 2.5); // Barcode Code39
				$pages[] = [
					'page_number' => $key,
					'barcode' => $barcode,
					'cert_url' => $cert_url,
					'cert_value_url' => $cert_value_url,
					'cert_name' => $value->par_name,
					'cert_date' => $value->par_exam_date,
					'cert_number' => $value->par_cert_number,
					'val_word' => $value->par_val_word,
					'val_excel' => $value->par_val_excel,
					'val_powerpoint' => $value->par_val_powerpoint,
					'cert_date_indonesia' => $localDate[$key]
				];
			}
			// return view('contents.page_generate.file_gen_cer_template_for_stamp_copy', compact('pages'));
			$pdf = PDF::loadView('contents.page_generate.file_gen_cer_template_for_stamp_copy', ['pages' => $pages])
				->setPaper('a4', 'landscape');
			return $pdf->download($filename);
		}
	}
	public function actionGenTemplateCertGoldSilver(Request $request)
	{
		$zip = new \ZipArchive;
		$data = $request->dataJson;
		$dataAr = json_decode($data);
		$pages = [];
		$tempFolder = public_path('trust_certificates');
		if (!file_exists($tempFolder)) {
			mkdir($tempFolder, 0777, true);
		}
		$filename_zip = date('Ymd_his') . '_' . $request->gen_filename . '.zip';
		$primary_domain = Setup_web::where('sw_id', '1')->first();
		$cert_url = url('storage/file_uploaded/' . $request->tmp_cert);
		$cert_value_url = url('storage/static/tmp_value.jpg');
		foreach ($dataAr as $key => $value) {
			$web = $primary_domain->sw_name . '/' . 'digital-transcript' . '/' . $value->par_hash_id;
			$barcode = DNS2D::getBarcodePNG($web,'QRCODE', 2.5, 2.5); // Barcode Code39
			$page = [
				'page_number' => $key,
				'barcode' => $barcode,
				'cert_url' => $cert_url,
				'cert_name' => $value->par_name,
				'cert_date' => $value->par_exam_date,
				'cert_number' => $value->par_cert_number,
			];
			$pdf = PDF::loadView('contents.page_generate.file_gen_cer_template_gold_silver', compact('page'))->setPaper('a4', 'landscape');
			$filename = "FILE_{$value->par_name}.pdf";
			$pdf->save($tempFolder . '/' . $filename);
			$zip->addFile($tempFolder, $filename);
		}
		// $zipFileName = 'pdf_files.zip';
		$zipPath = public_path($filename_zip);
		if (!File::exists($tempFolder)) {
			return response()->json(['error' => 'Folder pdfs tidak ditemukan'], 404);
		}
		$zip = new \ZipArchive;
		if (File::exists($tempFolder)) {
			if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
				$files = File::files($tempFolder);
				// Tambahkan semua file PDF ke dalam ZIP
				foreach ($files as $file) {
					$zip->addFile($file->getRealPath(), $file->getFilename());
				}
				$zip->close();
			} else {
				return response()->json(['error' => 'Gagal membuat ZIP file'], 500);
			}
		}
		if (File::exists($tempFolder)) {
			File::cleanDirectory($tempFolder);
		}
		return response()->download($zipPath)->deleteFileAfterSend(true);
	}	
	public function actionGenTemplateFront(Request $request)
	{
		if (!file_exists(storage_path('fonts/calibri.ttf'))) {
			dd("File calibri.ttf tidak ditemukan!");
		}
		$data = $request->dataJson;
		$dataAr = json_decode($data);
		$pages = [];
		$filename = date('Ymd_his') . '_' . $request->gen_filename . '.pdf';
		$primary_domain = Setup_web::where('sw_id', '1')->first();
		$cert_url = url('storage/file_uploaded/' . $request->tmp_cert);
		$cert_value_url = url('storage/static/tmp_value.jpg');
		foreach ($dataAr as $key => $value) {
			$web = $primary_domain->sw_name . '/' . 'digital-transcript' . '/' . $value->par_hash_id;
			$barcode = DNS2D::getBarcodePNG($web,'QRCODE', 2.5, 2.5); // Barcode Code39
			$pages[] = [
				'page_number' => $key,
				'barcode' => $barcode,
				'cert_url' => $cert_url,
				'cert_value_url' => $cert_value_url,
				'cert_name' => $value->par_name,
				'cert_date' => $value->par_exam_date,
				'cert_number' => $value->par_cert_number,
				'val_word' => $value->par_val_word,
				'val_excel' => $value->par_val_excel,
				'val_powerpoint' => $value->par_val_powerpoint,
			];
		}
		$height = 22 * 28.3465;
		$width = 30.7 * 28.3465;
		// return view('contents.page_generate.file_gen_front_template', compact('pages'));
		$pdf = PDF::loadView('contents.page_generate.file_gen_front_template', ['pages' => $pages])
			->setPaper([0,0,$width, $height])->setOption(['defaultFont' => 'sans-serif']);
		return $pdf->download($filename);
	}
	/* Tags:... */
	public function actionGenTemplateFrontWord(Request $request)
	{
		$phpWord = new PhpWord();
		$data = $request->dataJson;
		$dataAr = json_decode($data);
		$pages = [];
		$filename = date('Ymd_his') . '_' . $request->gen_filename . '.docx';
		$primary_domain = Setup_web::where('sw_id', '1')->first();
		// die();
		foreach ($dataAr as $key => $value) {
			$section[$key] = $phpWord->addSection([
				'pageSizeW' => 17487, // Lebar dalam Twips (30,7 cm)
				'pageSizeH' => 12474, // Tinggi dalam Twips (22 cm)
				'orientation' => 'landscape', // Bisa diganti 'landscape' jika diperlukan
				'marginTop' => 402.57, // Atur margin (Twips)
				'marginBottom' => 170.1,
				'marginLeft' => 170.1,
				'marginRight' => 170.1,
			]);
			# setup ms word
			$section[$key]->addText($value->par_name, ['name'=>'times new roman','bold' => true, 'size' => 22],
			['spaceBefore' => 3100, 'spaceAfter' => 10, 'indentation' => ['firstLine' => 1077.3]]);
			$section[$key]->addText($value->par_exam_date, ['name'=>'calibri','bold'=> true,'size' => 18],
			['spaceBefore' => 58, 'spaceAfter' => 3200, 'indentation' => ['firstLine' => 1730]]);
			$web = $primary_domain->sw_name . '/' . 'digital-transcript' . '/' . $value->par_hash_id;
			# generate barcode
			$barcode = DNS2D::getBarcodePNG($web, 'QRCODE', 2.5, 2.5);
			$barcode_filename = 'barcode-' . $value->par_hash_id . '.png';
			# save to to path
			$imagePath = public_path('barcodes/' . $barcode_filename);
			File::ensureDirectoryExists(public_path('barcodes')); // Ensure folder exists
			file_put_contents($imagePath, base64_decode($barcode));
			# add image to word
			if (file_exists($imagePath)) {
				$table = $section[$key]->addTable();
				$table->addRow();
				$table->addCell(10965.78); // 3 cm ruang kosong di sebelah kiri
				$cell = $table->addCell();
				$cell->addImage($imagePath, ['width' => 80, 'height' => 80]);
			}
			$section[$key]->addText('Certificate No: '.$value->par_cert_number, ['name' => 'times new roman', 'size' => 7],
			['spaceBefore' => 1400, 'spaceAfter' => 50, 'indentation' => ['firstLine' => 13948.2]]
			);
			$section[$key]->addPageBreak();
		}
		$filePath = public_path('trust_certificates/'.$filename);
		$objWriter = WordIOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save($filePath);
		return response()->download($filePath)->deleteFileAfterSend(true);
	}
	public function actionGenTemplateBack(Request $request)
	{
		$data = $request->dataJson;
		$dataAr = json_decode($data);
		$pages = [];
		$filename = date('Y-m-d_h-i-s') . '_' . $request->gen_filename . '.pdf';
		$primary_domain = Setup_web::where('sw_id', '1')->first();
		$cert_url = url('storage/file_uploaded/' . $request->tmp_cert);
		$cert_value_url = url('storage/static/tmp_value.jpg');
		foreach ($dataAr as $key => $value) {
			$web = $primary_domain->sw_name . '/' . 'digital-transcript' . '/' . $value->par_hash_id;
			$barcode = DNS2D::getBarcodePNG($web,'QRCODE', 2.5, 2.5); // Barcode Code39
			$pages[] = [
				'page_number' => $key,
				'barcode' => $barcode,
				'cert_url' => $cert_url,
				'cert_value_url' => $cert_value_url,
				'cert_name' => $value->par_name,
				'cert_date' => $value->par_exam_date,
				'cert_number' => $value->par_cert_number,
				'val_word' => $value->par_val_word,
				'val_excel' => $value->par_val_excel,
				'val_powerpoint' => $value->par_val_powerpoint,
			];
		}
		// return view('contents.page_generate.file_gen_back_template', compact('pages'));
		$pdf = PDF::loadView('contents.page_generate.file_gen_back_template', ['pages' => $pages])
			->setPaper('a4', 'landscape');
		return $pdf->download($filename);
	}
	public function actionGenTemplateBackWord(Request $request)
	{
		$phpWord = new PhpWord();
		$data = $request->dataJson;
		$dataAr = json_decode($data);
		$pages = [];
		$filename = date('Ymd_his') . '_' . $request->gen_filename . '.docx';
		$primary_domain = Setup_web::where('sw_id', '1')->first();
		$phpWord = new PhpWord();
$section = $phpWord->addSection();

// ** Gaya Tabel Utama **
$tableStyle = [
    'borderSize' => 6, 
    'borderColor' => '000000',
    'cellMargin' => 50
];
$phpWord->addTableStyle('MainTable', $tableStyle);

// ** Buat Tabel Utama **
$table = $section->addTable('MainTable');

// ** Header Tabel Utama **
$table->addRow();
$table->addCell(3000, ['valign' => 'center', 'bgColor' => '808080'])
    ->addText('Category', ['bold' => true, 'color' => 'FFFFFF'], ['alignment' => Jc::CENTER]);

$table->addCell(5000, ['valign' => 'center', 'bgColor' => '808080'])
    ->addText('Items', ['bold' => true, 'color' => 'FFFFFF'], ['alignment' => Jc::CENTER]);

// ** Data untuk Tabel Utama dan Tabel di Dalamnya **
$data = [
    'Software' => ['Microsoft Word', 'Microsoft Excel', 'Microsoft PowerPoint'],
    'Hardware' => ['CPU', 'RAM', 'SSD'],
];

// ** Tambahkan Baris untuk Setiap Kategori **
foreach ($data as $category => $items) {
    $table->addRow();
    
    // Kolom 1: Nama Kategori
    $table->addCell(3000, ['valign' => 'center'])->addText($category, ['size' => 11]);

    // Kolom 2: Tabel di Dalamnya
    $nestedCell = $table->addCell(5000, ['valign' => 'center']);
    $nestedTable = $nestedCell->addTable(); // Tambahkan tabel dalam sel

    foreach ($items as $item) {
        $nestedTable->addRow();
        $nestedTable->addCell(5000)->addText($item, ['size' => 10]);
    }
}

// ** Simpan sebagai File Word **
$file = 'Nested_Table.docx';
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="' . $file . '"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save("php://output");
		die();
		$tableStyle = [
			'borderSize' => 6, 
			'borderColor' => '000000',
			'cellMargin' => 90,
			'alignment' => Jc::CENTER,
		];
	
		// ** Gaya header **
		$headerStyle = [
			'name'=>'Tahoma',
			'bgColor' => '808080', // Abu-abu
			'bold' => true,
			'size' => 14,
		];
		foreach ($dataAr as $key => $value) {
			$section = $phpWord->addSection([
				'pageSizeW' => 17487, // Lebar dalam Twips (30,7 cm)
				'pageSizeH' => 12474, // Tinggi dalam Twips (22 cm)
				'orientation' => 'landscape', // Bisa diganti 'landscape' jika diperlukan
				'marginTop' => 1797.39, // Atur margin (Twips)
				'marginBottom' => 1797.39,
				'marginLeft' => 1440.18,
				'marginRight' => 1701,
			]);
			$section->addText('RESULT', ['name'=>'Elephant','bold' => true, 'size' => 18],['spaceBefore' => 510.3, 'spaceAfter' => 1417.5,'alignment' => Jc::CENTER]);
			$table = $section->addTable($tableStyle);
			$tablex = $section->addTable($tableStyle);
			// ** Baris Header **
			$table->addRow();
			$table->addCell(5000, ['valign' => 'center', 'bgColor' => '808080'])->addText('Materials', $headerStyle, ['spaceBefore' => 0, 'spaceAfter' => 0,'alignment' => Jc::CENTER]);
			// $table->addCell(15, ['valign' => 'center', 'bgColor' => '808080'])->addText('', ['bold' => true]);
			$table->addCell(3000, ['valign' => 'center', 'bgColor' => '808080'])->addText('Score', $headerStyle, ['spaceBefore' => 0, 'spaceAfter' => 0,'alignment' => Jc::CENTER]);
			
			// ** Baris Data **
			$materials = [
				'Microsoft Word 2019' => '«F6»',
				'Microsoft Excel 2019' => '«F7»',
				'Microsoft PowerPoint 2019' => '«F8»',
			];
			foreach ($materials as $material => $score) {
				$table->addRow();
				$table->addCell(5000, ['valign' => 'center'])->addText($material, ['size' => 14,'cellMargin'=>70],['spaceBefore' => 30, 'spaceAfter' => 30]);
				// $table->addCell(15, ['valign' => 'center', 'bgColor' => '808080'])->addText('', ['bold' => true]);
				$table->addCell(3000, ['valign' => 'center'])->addText($score, ['size' => 14,'cellMargin'=>70], ['spaceBefore' => 30, 'spaceAfter' => 30,'alignment' => Jc::CENTER]);
			}
		}
		$filePath = public_path($filename);
		$objWriter = WordIOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save($filePath);
		return response()->download($filePath)->deleteFileAfterSend(true);
	}
	/* Tags:... */
	public function actionGenTemplate(Request $request)
	{
		#code...
	}
}
