@extends('layout.app')
@section('title')
Home
@endsection
@section('pagetitle')
<div class="page-pretitle"></div>
<h4 class="page-title">Template Certificate</h4>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('generate') }}">Template certificate</a></li>
<li class="breadcrumb-item active"><a href="#">Template detail</a></li>
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
					<h3 class="card-title">Template Data</h3>
					<div class="card-actions" style="padding-right: 10px;">
						<a href="{{ url('generate/add_cert_template/' . $customer->cst_id) }}">
							<button class="btn btn-sm btn-primary btn-pill btn-light" style="vertical-align: middle;">
								<div style="font-weight: 700;">
									<i class="ri-add-circle-line icon" style="font-size: 14px; vertical-align: middle;"></i> Add Template
								</div>
							</button>
						</a>
						<a href="{{ url('generate') }}">
							<button class="btn btn-sm btn-danger btn-pill" style="vertical-align: middle;">
								<i class="ri-close-circle-line" style="font-size: 14px; vertical-align: middle;"></i>
							</button>
						</a>
					</div>
				</div>
				<div class="card-body card-body-custom">
					<div id="table-default" class="">
						<table class="table custom-datatables" id="gen-record-table" style="width: 100%;">
							<thead>
								<tr>
									<th style="width: 30%;">Template 1</th>
									<th style="width: 30%;">Template 2</th>
									<th style="width: 30%;">Name</th>
									<th style="text-align: center; width: 10%">MENU</th>
								</tr>
							</thead>
							<tbody class="table-tbody">
								@foreach ($cert as $key => $list)
									<tr>
										<td>{!! funcViewImage($list->ctm_file_1) !!} </td>
										<td>{!! funcViewImage($list->ctm_file_2) !!} </td>
										<td>{{ $list->ctm_name }}</td>
										<td>
											<a href="{{ url('generate/update_cert_template/'.$list->ctm_cst_id.'/'.$list->ctm_id) }}">
												<button type="button" class="badge bg-blue-lt w-100 m-1"></i> Update</button>
											</a>
											<a href="{{ url('generate/delete_cert_template/' . $list->ctm_cst_id . '/' . $list->ctm_id) }}">
												<button type="button" class="badge bg-red-lt w-100 m-1">Delete</button>
											</a>
										</td>
									</tr>
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