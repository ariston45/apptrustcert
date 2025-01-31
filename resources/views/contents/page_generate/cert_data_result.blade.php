@extends('layout.app')
@section('title')
Home
@endsection
@section('pagetitle')
<div class="page-pretitle"></div>
<h4 class="page-title">Generate Certificate</h4>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('generate') }}">Generate certificate</a></li>
<li class="breadcrumb-item"><a href="{{ url('generate/customer_cert_generate/' . $customer->cst_id) }}">Generate detail</a></li>
<li class="breadcrumb-item"><a href="{{ url('generate/new_generate/' . $customer->cst_id) }}">Form generate certificate</a></li>
<li class="breadcrumb-item active"><a href="#">Result Data</a></li>
@endsection
@section('content')
<div class="row mb-3">
	<div class="col-sm-12">
		<div class="card bg-primary-lt">
			<div class="card-body card-body-custom">
				<h4>Customer Name : {{ $customer->cst_name }}</h4>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 ">
		<div class="card">
			<div class="card-header card-header-custom card-header-light">
				<h3 class="card-title">Result Data</h3>
				<div class="card-actions" style="padding-right: 10px;">
					<form enctype="multipart/form-data" id="formGenTemplateCert" action="{{ route('action-gen-template-certificate') }}" method="POST">
						@csrf
						<input type="hidden" name="dataJson" value="{{ $dataJson }}">
					</form>
					<button type="submit" form="formGenTemplateCert" class="btn btn-sm btn-primary btn-pill btn-light" style="vertical-align: middle;">
						<div style="font-weight: 700;">
							<i class="ri-draft-line icon" style="font-size: 14px; vertical-align: middle;"></i> Template Digital Certificate
						</div>
					</button>
					<a href="{{ url('generate/new_generate/' . $customer->cst_id) }}">
						<button class="btn btn-sm btn-primary btn-pill btn-light" style="vertical-align: middle;">
							<div style="font-weight: 700;">
								<i class="ri-file-list-3-line icon" style="font-size: 14px; vertical-align: middle;"></i> Digital Certificate
							</div>
						</button>
					</a>
					<a href="{{ url('generate/new_generate/' . $customer->cst_id) }}">
						<button class="btn btn-sm btn-primary btn-pill btn-light" style="vertical-align: middle;">
							<div style="font-weight: 700;">
								<i class="ri-upload-cloud-2-fill icon" style="font-size: 14px; vertical-align: middle;"></i> Push to Online
							</div>
						</button>
					</a>
					
					<a href="{{ url('generate/customer_cert_generate/' . $customer->cst_id) }}">
						<button class="btn btn-sm btn-danger btn-pill" style="vertical-align: middle;">
							<i class="ri-close-circle-line" style="font-size: 14px; vertical-align: middle;"></i>
						</button>
					</a>
				</div>
			</div>
			<div class="card-body card-body-custom">
				<strong></strong>
				<div id="table-default" class="">
					<table class="table custom-datatables" style="width: 100%;">
						<thead>
							<tr>
								<th style="width: 5%;">No</th>
								<th style="width: 35%;">Name</th>
								<th style="width: 15%;">No. Certificate</th>
								<th style="width: 15%;">Exam Date</th>
								<th style="width: 10%;">Val. Ms. Word</th>
								<th style="width: 10%;">Val. Ms. Excel</th>
								<th style="width: 10%;">Val. Ms. Powerpoint</th>
							</tr>
						</thead>
						<tbody class="table-tbody">
							@php
$no = 1;
							@endphp
							@foreach ($dataList as $list)
								<tr>
									<td style="width: 5%;">{{ $no }}</td>
									<td style="width: 35%;">{{ $list['par_name'] }}</td>
									<td style="width: 15%;">{{ $list['par_cert_number'] }}</td>
									<td style="width: 15%;">{{ $list['par_exam_date'] }}</td>
									<td style="width: 10%;">{{ $list['par_val_word'] }}</td>
									<td style="width: 10%;">{{ $list['par_val_excel'] }}</td>
									<td style="width: 10%;">{{ $list['par_val_powerpoint'] }}</td>
								</tr>
								@php
	$no++;
								@endphp
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('style')
<link rel="stylesheet" href="{{ asset('customs/css/default.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jquery-confirm/jquery-confirm.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('customs/css/style_datatables.css') }}">
<style>
	.custom-datatables tbody tr td{
		padding-top: 4px;
		padding-bottom: 4px;
		padding-left: 0.8rem;
		padding-right: 0.8rem;
	}
	.custom-datatables tbody tr td p{
		margin: 0;
	}
	.custom-datatables-1 tbody tr td{
		padding-top: 3px;
		padding-bottom: 3px;
		padding-left: 0.5rem;
		padding-right: 0.5rem;
	}
	.custom-datatables-1 thead tr th{
		padding-top: 8px;
		padding-bottom: 8px;
		padding-left: 0.5rem;
		padding-right: 0.5rem;
	}
	.custom-datatables-1 tbody tr td p{
		margin: 0px;
	}
	.ts-control{
		padding-bottom: 0.28rem;
		padding-top: 0.28rem;
		padding-left: 0.39rem;
	}
	.ts-input-custom{
		min-height: 0.53rem;
	}
	.modal-full-width-custom {
		max-width: none;
		margin-top: 0px;
		margin-right: 8rem;
		margin-bottom: 0px;
		margin-left: 8rem;
	}
	.item-panel-value {
		padding-bottom: 10px;
	}
	.card-body-panel{
		padding: 10px 10px 0px 18px;
	}
	#todo-table thead th{
		padding-left: 0px;
	}
</style>
@endpush
@push('script')
	<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
	<script src="{{ asset('plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
	<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
	<script src="{{ asset('plugins/litepicker/bundle/index.umd.min.js') }}"></script>
	<script src="{{ asset('plugins/fullcalender-scheduler/dist/index.global.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	
@endpush