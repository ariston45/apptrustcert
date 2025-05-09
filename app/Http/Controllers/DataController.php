<?php

namespace App\Http\Controllers;

use App\Models\Cst_userlist;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use DB;
#
use Illuminate\Support\Carbon;
use Str;
use DNS2D;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Illuminate\Support\Facades\Storage;
#

use App\Models\User;
#
use App\Models\Cst_customer;
use App\Models\Par_participant;
use App\Models\Rec_gen_record;
use App\Models\Cert_category;
use App\Models\Cert_template;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Support\Facades\Http;
#
class DataController extends Controller
{
	# <===========================================================================================================================================================>
	#user #data_user
  public function sourceDataUser(Request $request)
	{
		$colect_data = User::all();
		return DataTables::of($colect_data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('menu', function ($colect_data) {
			return '<div class="btn-group">
			<button type="button" class="btn btn-xs bg-gradient-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</button>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="'.url('setting/user/detail-user/'.$colect_data->id).'"><button class="dropdown-item btn-sm" type="button"><i class="fas fa-eye cst-mr-5"></i>Lihat Detail</button></a>
			</div></div>';
		})
		->addColumn('name', function ($colect_data) {
			return $colect_data->name;
		})
		->addColumn('username', function ($colect_data) {
			return $colect_data->username;
		})
		->addColumn('email', function ($colect_data) {
			return $colect_data->email;
		})
		->rawColumns(['name', 'username', 'email','menu'])
		->make('true');
	}
	# <===========================================================================================================================================================>
	/* Tags:... */
	public function exportStaffReport(Request $request)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		// Menulis data ke dalam spreadsheet
		# column definition
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
		$sheet->getColumnDimension('H')->setAutoSize(true);
		$sheet->getColumnDimension('I')->setAutoSize(true);
		$sheet->getColumnDimension('J')->setAutoSize(true);
		$sheet->getColumnDimension('K')->setAutoSize(true);
		$sheet->getColumnDimension('L')->setAutoSize(true);
		$sheet->getColumnDimension('M')->setAutoSize(true);
		$sheet->getColumnDimension('N')->setAutoSize(true);
		$sheet->getColumnDimension('O')->setAutoSize(true);
		$sheet->getColumnDimension('P')->setAutoSize(true);
		$sheet->getColumnDimension('Q')->setAutoSize(true);
		$sheet->getColumnDimension('R')->setAutoSize(true);
		$sheet->getColumnDimension('S')->setAutoSize(true);
		$sheet->getColumnDimension('T')->setAutoSize(true);
		$sheet->getColumnDimension('U')->setAutoSize(true);
		$sheet->getColumnDimension('V')->setAutoSize(true);
		$sheet->getColumnDimension('W')->setAutoSize(true);
		# Title
		$sheet->mergeCells('A1:A2');
		$sheet->mergeCells('B1:B2');
		$sheet->mergeCells('C1:C2');
		$sheet->mergeCells('D1:F1');
		$sheet->mergeCells('G1:L1');
		$sheet->mergeCells('M1:M2');
		$sheet->mergeCells('N1:T1');
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$sheet->getStyle('B1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('B1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$sheet->getStyle('C1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('C1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$sheet->getStyle('D1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('G1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('M1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		$sheet->getStyle('M1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('N1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A1:T2')->getFont()->setBold(true)->getColor()->setARGB('e6e7e9');
		$sheet->getStyle('A1:T2')->getFill()->getStartColor()->setARGB('39656b');
		$sheet->getStyle('A1:T2')->getFill()->setFillType(Fill::FILL_SOLID);
		$sheet->getStyle('A1:T2')->getBorders()->applyFromArray([
			'allBorders' => [
				'borderStyle' => Border::BORDER_MEDIUM,  // Jenis border: tipis
				'color' => ['argb' => 'e6e7e9'],     // Warna border: hitam dalam format ARGB
			],
		]);

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'Team');
		$sheet->setCellValue('D1', 'Lead');
		$sheet->setCellValue('D2', 'Propecting');
		$sheet->setCellValue('E2', 'Qualifying');
		$sheet->setCellValue('F2', 'Opportunity');
		$sheet->setCellValue('G2', 'Dead End');
		$sheet->setCellValue('H1', 'Opportunity');
		$sheet->setCellValue('H2', 'Presentation');
		$sheet->setCellValue('I2', 'POC');
		$sheet->setCellValue('J2', 'Proposal');
		$sheet->setCellValue('K2', 'Presentation');
		$sheet->setCellValue('L2', 'Win');
		$sheet->setCellValue('M2', 'Lose');
		$sheet->setCellValue('N1', 'Purchase');
		$sheet->setCellValue('M1', 'Activity');
		$sheet->setCellValue('M2', 'To Do');
		$sheet->setCellValue('N2', 'Phone');
		$sheet->setCellValue('O2', 'Email');
		$sheet->setCellValue('P2', 'Visit');
		$sheet->setCellValue('Q2', 'POC');
		$sheet->setCellValue('R2', 'Webinar');
		$sheet->setCellValue('T2', 'Video Call');
		# Test
		$sheet->setCellValue('A3', '1');
		$sheet->setCellValue('B3', 'John Doe');
		$sheet->setCellValue('C3', 'johndoe@example.com');
		// Menyimpan file spreadsheet ke dalam format XLSX
		$writer = new Xlsx($spreadsheet);
		$fileName = 'data-export.xlsx';
		$filePath = storage_path($fileName);

		$writer->save($filePath);

		// Mengunduh file
		return response()->download($filePath)->deleteFileAfterSend(true);
	}
	################################################################################################################################################
	################################################################################################################################################
	################################################################################################################################################
	public function sourceDataCustomer(Request $request)
	{
		$colect_data = Cst_customer::get();
		$num = 1;
		return DataTables::of($colect_data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('menu', function ($colect_data) {
			$res ='<div style="text-align:center;">
			<a href="'.url('generate/customer_cert_generate/'. $colect_data->cst_id). '"><button type="button" class="badge bg-blue-lt"><i class="ri-file-shield-2-fill icon"></i> Generates</button></a>
			<a href="' . url('generate/customer_cert_template/' . $colect_data->cst_id) . '"><button type="button" class="badge bg-orange-lt"><i class="ri-file-list-3-fill icon"></i> Templates</button></a>
			</div>';
			return $res;
		})
		->addColumn('customer', function ($colect_data) {
			return '<div><input class="form-check-input ck_cst" type="checkbox" name="cst_id[]" value="'. $colect_data->cst_id.'"><b><a href="' . url('generate/update-customer/'. $colect_data->cst_id) . '"> ' . $colect_data->cst_name . '</a></b></div>';
		})
		->addColumn('type', function ($colect_data) {
			return $colect_data->cst_sts_custom_certificate;
		})
		->addColumn('phone', function ($colect_data) {
			return $colect_data->cst_phone;
		})
		->addColumn('email', function ($colect_data) {
			return $colect_data->cst_email;
		})
		->rawColumns(['menu', 'customer','type','phone','email'])
		->make('true');
	}
  public function sourceDataCustomer_userlist(Request $request)
  {
    $auth = Auth::user();
    $ids_cst = Cst_userlist::where('li_user',$auth->id)->get();
    $ids = [];
    foreach ($ids_cst as $key => $value) {
      $ids[$key] = $value->li_cst;
    }
    $colect_data = Cst_customer::whereIn('cst_id',$ids)->get();
    $data = [];
    foreach ($colect_data as $key => $value) {
      $data[] = [
        'id' => $value->cst_id,
        'customer' => $value->cst_name,
        'type' => $value->cst_sts_custom_certificate,
        'phone' => $value->cst_phone,
        'email' => $value->cst_email,
        'menu' => '<div style="text-align:center;">
          <a href="' . url('generate/customer_cert_generate/' . $value->cst_id) . '"><button type="button" class="badge bg-blue-lt"><i class="ri-file-shield-2-fill icon"></i> Generates</button></a>
          <a href="' . url('generate/customer_cert_template/' . $value->cst_id) . '"><button type="button" class="badge bg-orange-lt"><i class="ri-file-list-3-fill icon"></i> Templates</button></a>
          </div>',
      ];
    }
    return $data;
  }
  public function sourceDataCustomerVer2(Request $request)
  {
    $colect_data = Cst_customer::get();
    $num = 1;
    return DataTables::of($colect_data)
      ->addIndexColumn()
      ->addColumn('empty_str', function ($k) {
        return '';
      })
      ->addColumn('menu', function ($colect_data) {
        $res = '<div style="text-align:center;">
			<a href="' . url('generate/customer_cert_generate/' . $colect_data->cst_id) . '"><button type="button" class="badge bg-blue-lt"><i class="ri-file-shield-2-fill icon"></i> Generates</button></a>
			</div>';
        return $res;
      })
      ->addColumn('customer', function ($colect_data) {
        return $colect_data->cst_name;
      })
      ->addColumn('type', function ($colect_data) {
        return $colect_data->cst_sts_custom_certificate;
      })
      ->addColumn('phone', function ($colect_data) {
        return $colect_data->cst_phone;
      })
      ->addColumn('email', function ($colect_data) {
        return $colect_data->cst_email;
      })
      ->rawColumns(['menu', 'customer', 'type', 'phone', 'email'])
      ->make('true');
  }
	/* Tags:... */
	public function sourceDataGenRecord(Request $request)
	{
		$id = $request->id;
		$colect_data = Rec_gen_record::where('rec_customer_id',$id)
		->get();
		$num = 1;
		return DataTables::of($colect_data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('menu', function ($colect_data) {
			$res = '<div style="text-align:center;">
			<a href="' . url('generate/datalist_certificate/' . $colect_data->rec_customer_id.'/'. $colect_data->rec_id) . '"><button type="button" class="badge bg-blue w-100">Data List</button></a>
			</div>';
			return $res;
		})
		->addColumn('date', function ($colect_data) {
			return $colect_data->rec_date;
		})
		->addColumn('sync_date', function ($colect_data) {
			if ($colect_data->rec_sync_date == null) {
				return '<div style="text-align:center;">--</div>';
			}else{
				return '<div style="text-align:center;">'.date('d-M-y H:i', strtotime($colect_data->rec_sync_date)).'</div>' ;
			}
		})
		->addColumn('count', function ($colect_data) {
			return $colect_data->rec_count;
		})
		->addColumn('name', function ($colect_data) {
			return $colect_data->rec_name;
		})
		->addColumn('note', function ($colect_data) {
			return $colect_data->rec_note;
		})
		->rawColumns(['menu','date', 'count','note','name', 'sync_date'])
		->make('true');
	}
	/* Tags:... */
	public function sourceDataParticipant(Request $request)
	{
		$id = $request->id;
		$participant_data = Par_participant::where('par_id', $id)->first();
		$data = [
			'id' =>$participant_data->par_id,
			'name' => $participant_data->par_name,
			'number' => $participant_data->par_cert_number,
			'date' => $participant_data->par_exam_date,
			'date_scd' => $participant_data->par_exam_date_scd,
			'word' => $participant_data->par_val_word,
			'excel' => $participant_data->par_val_excel,
			'powerpoint' => $participant_data->par_val_powerpoint,
		];
		return $data;
	}
  public function sourceDataParticipantQr(Request $request)
  {
    $id = $request->id;
    $participant_data = Par_participant::where('par_id', $id)->first();
    $website = 'https://certv.trusttrain.com/digital-transcript/'.$participant_data->par_hash_id;
    $barcode = DNS2D::getBarcodePNG($website, 'QRCODE', 2.5, 2.5);
    $data = [
      "code" => "data:image/png;base64,".$barcode,
      "link" => $website,
    ];
    return $data;
  }
	/* Tags:... */
	public function downloadTemplateInput (Request $request)
	{
		$path = 'public/static/docs/file_template_general.xlsx';
		return response()->download($path);
	}
	public function deleteTemplateInput(Request $request)
	{
		$id = $request->id;
		$customer = Cst_customer::where('cst_id', $id)->first();
		if ($customer->cst_sts_custom_input == 'true') {
			$path = 'public/file_uploaded/' . $customer->cst_file_custom_input;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			Cst_customer::where('cst_id',$id)->update(['cst_sts_custom_input'=>'false', 'cst_file_custom_input'=>null]);
			Storage::delete($path);
			return redirect()->back();
		} else {
			return redirect()->back();
		}
	}
	public function downloadTemplateCert(Request $request)
	{
		$file_id = $request->id;
		$check_file = Cst_customer::where('cst_file_custom_certificate', $file_id)->first();
		if ($check_file->cst_file_custom_certificate != null ) {
			$path = 'public/file_uploaded/' . $check_file->cst_file_custom_certificate;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			return Storage::download($path);
		} else {
			return abort(404, 'File not found');
		}
	}
	public function downloadTemplateCertScd(Request $request)
	{
		$file_id = $request->id;
		$check_file = Cst_customer::where('cst_file_custom_certificate_scd', $file_id)->first();
		if ($check_file->cst_file_custom_certificate != null) {
			$path = 'public/file_uploaded/' . $check_file->cst_file_custom_certificate;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			return Storage::download($path);
		} else {
			return abort(404, 'File not found');
		}
	}
	public function downloadTmpFile1(Request $request)
	{
		$file_id = $request->id;
		$check_file = Cert_template::where('ctm_file_1', $file_id)->first();
		if ($check_file->ctm_file_1 != null) {
			$path = 'public/file_uploaded/' . $check_file->ctm_file_1;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			return Storage::download($path);
		} else {
			return abort(404, 'File not found');
		}
	}
	public function downloadTmpFile2(Request $request)
	{
		$file_id = $request->id;
		$check_file = Cert_template::where('ctm_file_1', $file_id)->first();
		if ($check_file->ctm_file_2 != null) {
			$path = 'public/file_uploaded/' . $check_file->ctm_file_2;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			return Storage::download($path);
		} else {
			return abort(404, 'File not found');
		}
	}
	/* Tags:... */
	public function deleteTemplateCert1(Request $request)
	{
		$file_id = $request->id;
		$check_file = Cert_template::where('ctm_file_1', $file_id)->first();
		if ($check_file->ctm_file_1 != null) {
			$path = 'public/file_uploaded/' . $check_file->ctm_file_1;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			Cert_template::where('ctm_file_1', $file_id)->update(['ctm_file_1' => null]);
			Storage::delete($path);
			return redirect()->back();
		} else {
			return redirect()->back();
		}
	}
	public function deleteTemplateCert2(Request $request)
	{
		$file_id = $request->id;
		$check_file = Cert_template::where('ctm_file_2', $file_id)->first();
		if ($check_file->ctm_file_2 != null) {
			$path = 'public/file_uploaded/' . $check_file->ctm_file_2;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			Cert_template::where('ctm_file_2', $file_id)->update(['ctm_file_2' => null]);
			Storage::delete($path);
			return redirect()->back();
		} else {
			return redirect()->back();
		}
	}
	public function deleteTemplateCert(Request $request)
	{
		$file_id = $request->id;
		$customer = Cst_customer::where('cst_file_custom_certificate', $file_id)->first();
		// dd($customer);
		if ($customer->cst_file_custom_certificate != null) {
			$path = 'public/file_uploaded/' . $customer->cst_file_custom_certificate;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			Cst_customer::where('cst_file_custom_certificate', $file_id)->update(['cst_file_custom_certificate' => null]);
			Storage::delete($path);
			return redirect()->back();
		} else {
			return redirect()->back();
		}
	}
	public function deleteTemplateCertScd(Request $request)
	{
		$file_id = $request->id;
		$customer = Cst_customer::where('cst_file_custom_certificate_scd', $file_id)->first();
		if ($customer->cst_file_custom_certificate != null) {
			$path = 'public/file_uploaded/' . $customer->cst_file_custom_certificate;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			Cst_customer::where('cst_file_custom_certificate_scd', $file_id)->update(['cst_file_custom_certificate_scd' => null]);
			Storage::delete($path);
			return redirect()->back();
		} else {
			return redirect()->back();
		}
	}
	/* Tags:... */
	public function pushDataOnlineGoldSilver(Request $request)
	{
		$rec_id = $request->rec_id;
		$dataCustomer = json_decode($request->dataJsonCustomer);
		$dataGold = json_decode($request->dataJsonGold);
		$dataSilver = json_decode($request->dataJsonSilver);
		$dataRecord = json_decode($request->dataRecord);
		$data = [
			"data_customer" => $dataCustomer,
			"data_record" =>$dataRecord,
			"data_gold" => $dataGold,
			"data_silver" => $dataSilver
		];
		$token = $request->bearerToken();
		$response = Http::withToken($token)
		->withHeaders(['Content-Type' => 'application/json'])
		->post('https://certv.trusttrain.com/api/data_gold_silver', [$data]);
		// return $response;
		$date = date('Y-m-d h:i:s');
		Rec_gen_record::where('rec_id', $rec_id)->update(['rec_sync_date' => $date]);
		return redirect()->back();
	}
	public function pushDataOnline(Request $request)
	{
		$rec_id = $request->rec_id;
		$dataCustomer = json_decode($request->dataJsonCustomer);
		$dataGeneral = json_decode($request->dataJson);
		// dd($dataGeneral);
		$dataRecord = json_decode($request->dataRecord);
		$data = [
			"data_customer" => $dataCustomer,
			"data_record" => $dataRecord,
			"data_general" => $dataGeneral
		];
		$token = $request->bearerToken();
		$response = Http::withToken($token)
		->withHeaders(['Content-Type' => 'application/json'])
		->post('https://certv.trusttrain.com/api/data_general', [$data]);
		// return $response;
		$date = date('Y-m-d h:i:s');
		Rec_gen_record::where('rec_id', $rec_id)->update(['rec_sync_date' => $date]);
		return redirect()->back();
	}
  public function pushDataOnline_ii(Request $request)
  {
    $id = $request->id;
    $data_record = Rec_gen_record::where('rec_id',$id)->first();
    if ($data_record != null) {
      $data_customer = Cst_customer::where('cst_id',$data_record->rec_customer_id)->first();
      $data_participant = Par_participant::where('par_rec_id',$id)->get();
      $data_participant_arr = [];
      foreach ($data_participant as $key => $value) {
        $data_participant_arr[$key] = [
          'par_id' => $value->par_id,
          'par_customer_id' => $value->par_customer_id,
          'par_rec_id' => $value->par_rec_id,
          'par_cert_number' => $value->par_cert_number,
          'par_name' => $value->par_name,
          'par_exam_date' => date('F d, Y', strtotime($value->par_exam_date)),
          'par_exam_date_raw' => $value->par_exam_date,
          'par_exam_date_scd_raw' => $value->par_exam_date_scd,
          'par_hash_id' => $value->par_hash_id,
          'par_type' => $value->par_type,
          'par_val_word' => $value->par_val_word,
          'par_val_excel' => $value->par_val_excel,
          'par_val_powerpoint' => $value->par_val_powerpoint,
        ];
      }
      $data_participant_json = json_encode($data_participant_arr);
      $data_customer_json = json_encode($data_customer);
      $data_record_json = json_encode($data_record);
      $data = [
        "data_customer" => json_decode($data_customer_json),
        "data_record" => json_decode($data_record_json),
        "data_general" => json_decode($data_participant_json)
      ];
      $token = $request->bearerToken();
      $response = Http::withToken($token)
        ->withHeaders(['Content-Type' => 'application/json'])
        ->post('https://certv.trusttrain.com/api/data_general', [$data]);
        // ->post('http://127.0.0.1/appinformcert/api/data_general', [$data]);
      $date = date('Y-m-d h:i:s');
      Rec_gen_record::where('rec_id', $id)->update(['rec_sync_date' => $date]);
      return redirect()->back();
    }else {
      echo "Sync data tidak berhasil. Klik berikut untuk kembali . <a href='".url('sync')."'>Kembali</a>";
    }
  }
	public function pushSettindCertOnline(Request $request)
	{
		$data_cert = Cert_category::get()->toArray();
		$token = $request->bearerToken();
		$response = Http::withToken($token)
		->withHeaders(['Content-Type' => 'application/json'])
		->post('https://certv.trusttrain.com/api/data_cert_setting', [$data_cert]);
		// return $response;
		return redirect()->back();
	}
	//
	public function sourceCert(Request $request)
	{
		$colect_data = Cert_category::get();
		return DataTables::of($colect_data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('menu', function ($colect_data) {
			$res = '<div style="text-align:center;">';
			$res.= '<a href="'.url('setting/certificate/update-cetificate/'.$colect_data->cert_id).'"><button type="button" class="badge bg-green-lt" style="margin-right:4px;">Edit</button></a>';
			// $res.= '<a href="' . url('setting/action_delete_cert/' . $colect_data->cert_id) . '"><button type="button" class="badge bg-red-lt">Delete</button></a>';
			$res.= '</div>';
			return $res;
		})
		->addColumn('type', function ($colect_data) {
			if ($colect_data->cert_type == 'COP') {
				$res = 'Certificate Of Proficiency';
			}else if($colect_data->cert_type == 'COA'){
				$res = 'Certificate Of Achievement';
			}else{
				$res = 'Certificate Of Competence';
			}
			return $res;
		})
		->addColumn('title', function ($colect_data) {
			return $colect_data->cert_title;
		})
		->rawColumns(['type', 'title', 'menu'])
		->make('true');
	}
  public function sourceUser(Request $request)
  {
    $colect_data = User::get();
    return DataTables::of($colect_data)
      ->addIndexColumn()
      ->addColumn('empty_str', function ($k) {
        return '';
      })
      ->addColumn('menu', function ($colect_data) {
        $res = '<div style="text-align:center;">';
        $res .= '<a href="' . url('setting/user/update-user/' . $colect_data->id) . '"><button type="button" class="badge bg-green-lt" style="margin-right:4px;">Edit</button></a>';
        // $res.= '<a href="' . url('setting/action_delete_cert/' . $colect_data->cert_id) . '"><button type="button" class="badge bg-red-lt">Delete</button></a>';
        $res .= '</div>';
        return $res;
      })
      ->addColumn('name', function ($colect_data) {
        return $colect_data->name;
      })
      ->addColumn('username', function ($colect_data) {
        return $colect_data->username;
      })
      ->addColumn('email', function ($colect_data) {
        return $colect_data->email;
      })
      ->rawColumns(['name', 'username','email', 'menu'])
      ->make('true');
  }

  public function viewSyncList(Request $request){
    $user = Auth::user();
    $users = User::get();
    return view('contents.page_generate.sync_data', compact('user'));
  }
  public function sourceSyncList(Request $request){
    $colect_data = Rec_gen_record::leftJoin('cst_customers', 'rec_gen_records.rec_customer_id', '=', 'cst_customers.cst_id')
    ->where('rec_gen_records.rec_sync_date', '=', null)
    ->select('rec_gen_records.*', 'cst_customers.cst_name')
    ->get();
    return DataTables::of($colect_data)
    ->addIndexColumn()
    ->addColumn('empty_str', function ($k) {
      return '';
    })
    ->addColumn('menu', function ($colect_data) {
      $res = '<div style="text-align:center;">';
      $res .= '<a href="' . url('sync/action_sync_data/' . $colect_data->rec_id) . '"><button type="button" class="badge bg-green-lt" style="margin-right:4px;">Sync</button></a>';
      // $res.= '<a href="' . url('setting/action_delete_cert/' . $colect_data->cert_id) . '"><button type="button" class="badge bg-red-lt">Delete</button></a>';
      $res .= '</div>';
      return $res;
    })
    ->addColumn('name', function ($colect_data) {
      return $colect_data->cst_name;
    })
    ->addColumn('records', function ($colect_data) {
      return $colect_data->rec_name;
    })
    ->addColumn('last_sync', function ($colect_data) {
      return $colect_data->email;
    })
    ->rawColumns(['name', 'records', 'last_sync', 'menu'])
    ->make('true');
  }
  public function updateDataCustomerUser(Request $request) {
    $user = Auth::user();
    if ($user != null) {
      $data = $request->params;
      $data_listed = Cst_userlist::where('li_user',$user->id)->delete();
      foreach ($data as $key => $value) {
        $data_listed = new Cst_userlist();
        $data_listed->li_user = $user->id;
        $data_listed->li_cst = $value;
        $data_listed->save();
      }
      return response()->json(['status' => 'success', 'message' => 'Data has been updated']);
    }
  }
}
