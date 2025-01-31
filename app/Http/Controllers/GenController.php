<?php

namespace App\Http\Controllers;

use App\Models\Cst_customer;
use App\Models\Par_participant;
use App\Models\Rec_gen_record;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\User;
use DNS2D;
use Auth;
use Str;
use PDF;
use Storage;

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
				'file_upload_temp_cert' => 'required|file|mimes:jpg,jpeg,png|max:1024',
				'file_upload_temp_input' => 'file|mimes:xls,xlsx|max:1024'
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
		$fileName_InputFile = null;
		$cst_sts_custom_input = 'false';
		if ($request->hasFile('file_upload_temp_cert')) {
			$file = $request->file('file_upload_temp_cert');
			$fileName_CertFile = Str::uuid(). '.' . $file->extension();
			$path = $file->storeAs('file_uploaded', $fileName_CertFile, 'public'); 
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
			'cst_file_custom_certificate' => $fileName_CertFile
		];
		Cst_customer::insert($data_cst);
		return redirect()->to(url('generate'));
	}
	public function actionUpdateCustomer(Request $request)
	{
		$request->validate(
			[
				'file_upload_temp_cert' => 'file|mimes:jpg,jpeg,png|max:1024',
				'file_upload_temp_input' => 'file|mimes:xls,xlsx|max:1024'
			],
			[
				'file_upload_temp_cert.mimes' => 'File harus dalam format .jpg .jpeg .png',
				'file_upload_temp_cert.max' => 'Ukuran file maksimal 1 Mb.',
				'file_upload_temp_input.mimes' => 'File harus dalam format .xls .xlsx',
				'file_upload_temp_input.max' => 'Ukuran file maksimal 1 Mb.',
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
			'cst_file_custom_certificate' => $fileName_CertFile
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
		$par_id = genIdParticipant();
		switch ($customer->cst_sts_custom_certificate) {
			case 'GENERAL':
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
				$spreadsheet = IOFactory::load($file->getRealPath());
				$sheet = $spreadsheet->getActiveSheet();
				$dataColect = $sheet->toArray();
				$dataWithoutHeader = array_slice($dataColect, 1);
				foreach ($dataWithoutHeader as $key => $value) {
					$data[$key] = [
						'par_id' => $par_id,
						'par_customer_id' => $id,
						'par_rec_id' => $id_record,
						'par_cert_number' => $value[3],
						'par_name' => $value[1],
						'par_exam_date' => date('Y-m-d', strtotime($value[2])),
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
					'rec_push_status' => 'false',
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

				break;
				##############################################################################################################################################################
			case 'STAMP_COPY':

				break;
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
		$data_list_certificate = Par_participant::where('par_rec_id', $gen_id)
		->get();
		$customer = Cst_customer::where('cst_id', $cst_id)
		->first();
		foreach ($data_list_certificate as $key => $value) {
			$dataList[$key] = [
				'par_id' => $value->par_id,
				'par_customer_id' => $value->par_customer_id,
				'par_rec_id' => $value->par_rec_id,
				'par_cert_number' => $value->par_cert_number,
				'par_name' => $value->par_name,
				'par_exam_date' => date('F d, Y', strtotime($value->par_exam_date)),
				'par_hash_id' => $value->par_hash_id,
				'par_val_word' => $value->par_val_word,
				'par_val_excel' => $value->par_val_excel,
				'par_val_powerpoint' => $value->par_val_powerpoint,
			];
		}
		$dataJson = json_encode($dataList);
		return view('contents.page_generate.cert_data_result', compact('user', 'gen_id', 'customer', 'dataJson', 'dataList'));
	}
	/* Tags:... */
	public function actionGenTemplateCert(Request $request)
	{
		$data = $request->dataJson;
		$dataAr = json_decode($data);
		$pages = [];
		foreach ($dataAr as $key => $value) {
			$web = 'https://example.com/'.$value->par_hash_id;
			$barcode = DNS2D::getBarcodePNG($web, 'QRCODE'); // Barcode Code39
			$pages[] = [
				'page_number' => $key,
				'barcode' => $barcode,
			];
		}
		// Kirim data ke view
		$pdf = PDF::loadView('contents.page_generate.file_gen_cer_template', ['pages' => $pages])
			->setPaper('a4', 'landscape');

		// Download PDF
		return $pdf->download('pdf_with_barcodes.pdf');
	}
	/* Tags:... */
	public function actionGenTemplate(Request $request)
	{
		#code...
	}
}
