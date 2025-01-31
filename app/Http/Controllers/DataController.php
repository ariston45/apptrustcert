<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Auth;
use DB;
#
use Illuminate\Support\Carbon;
use Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Illuminate\Support\Facades\Storage;
#
use App\Models\Act_activity;
use App\Models\Act_activity_access;
use App\Models\Addr_city;
use App\Models\Addr_district;
use App\Models\Addr_province;
use App\Models\Addr_subdistrict;
use App\Models\Cst_contact_email;
use App\Models\Cst_contact_mobile;
use App\Models\Cst_institution;
use App\Models\Cst_personal;
use App\Models\Prs_lead;
use App\Models\User;
use App\Models\Prs_accessrule;
#
use App\Models\Prs_salesperson;
use App\Models\Cst_customer;
use App\Models\Rec_gen_record;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
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
			<a href="'.url('generate/customer_cert_generate/'. $colect_data->cst_id). '"><button type="button" class="badge bg-blue-lt"><i class="ri-file-settings-fill icon"></i> Generate Certificate</button></a>
			<a href="' . url('generate/update-customer/' . $colect_data->cst_id) . '"><button type="button" class="badge bg-blue-lt"><i class="ri-edit-2-line icon"></i> Update Data</button></a>
			</div>';
			return $res;
		})
		->addColumn('customer', function ($colect_data) {
			return '<di><b><a href="' . url('customer/detail-customer/' . $colect_data->cst_id . '?extpg=information') . '">' . $colect_data->cst_name . '</a></b></di>';
		})
		->rawColumns(['menu', 'customer'])
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
			<a href="' . url('generate/datalist_certificate/' . $colect_data->rec_customer_id.'/'. $colect_data->rec_id) . '"><button type="button" class="badge bg-blue">Data List</button></a>
			</div>';
			return $res;
		})
		->addColumn('date', function ($colect_data) {
			return $colect_data->rec_date;
		})
		->addColumn('count', function ($colect_data) {
			return $colect_data->rec_count;
		})
		->addColumn('note', function ($colect_data) {
			return $colect_data->rec_note;
		})
		->rawColumns(['menu','date', 'count','note'])
		->make('true');
	}
	/* Tags:... */
	public function downloadTemplateInput (Request $request)
	{
		$id = $request->id;
		$customer = Cst_customer::where('cst_id',$id)->first();
		if($customer->cst_sts_custom_input == 'true'){
			$path = 'public/file_uploaded/'.$customer->cst_file_custom_input;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			return Storage::download($path);
		}else{
			$path = 'public/static/docs/file_template_general.xlsx';
			return response()->download($path);
		}
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
		$id = $request->id;
		$customer = Cst_customer::where('cst_id', $id)->first();
		if ($customer->cst_file_custom_certificate != null ) {
			$path = 'public/file_uploaded/' . $customer->cst_file_custom_certificate;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			return Storage::download($path);
		} else {
			return abort(404, 'File not found');
		}
	}
	public function deleteTemplateCert(Request $request)
	{
		$id = $request->id;
		$customer = Cst_customer::where('cst_id', $id)->first();
		if ($customer->cst_file_custom_certificate != null) {
			$path = 'public/file_uploaded/' . $customer->cst_file_custom_certificate;
			if (!Storage::exists($path)) {
				return abort(404, 'File not found');
			}
			Cst_customer::where('cst_id', $id)->update(['cst_file_custom_certificate' => null]);
			Storage::delete($path);
			return redirect()->back();
		} else {
			return redirect()->back();
		}
	}
	
}
