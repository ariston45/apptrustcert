@extends('layout.app')
@section('title')
Home
@endsection
@section('pagetitle')
<div class="page-pretitle"></div>
<h4 class="page-title">Add Customer</h4>
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ url('generate') }}">Template certificate</a></li>
	<li class="breadcrumb-item"><a href="{{ url('generate/customer_cert_template/' . $customer->cst_id) }}">Template detail</a></li>
	<li class="breadcrumb-item active"><a href="#">Add Template</a></li>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12 ">
			<div class="card">
				<div class="card-header card-header-custom card-header-light">
					<h3 class="card-title">Form Generate Certificate</h3>
					<div class="card-actions" style="padding-right: 10px;">
						<a href="{{ url('generate/customer_cert_template/' . $customer->cst_id) }}">
							<button class="btn btn-sm btn-danger btn-pill" style="vertical-align: middle;">
								<i class="ri-close-circle-line" style="font-size: 14px; vertical-align: middle;"></i>
							</button>
						</a>
					</div>
				</div>
				<div class="card-body card-body-custom">
					<form id="formContent1" enctype="multipart/form-data" action="{{ route('action-update-template') }}" method="POST" autocomplete="new-password">
						@csrf
						<div class="card-body card-body-custom">
							<div class="row mb-2">
								<div class="col-xl-12">
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;">Template Name</label>
										<div id="select-customer-name" class="col-7">
											<input type="hidden" name="cst_id" value="{{ $customer->cst_id }}">
											<input type="hidden" name="ctm_id" value="{{ $cert->ctm_id }}">
											<input name="inp_name" id="inp-name" type="text" class="form-control" value="{{ $cert->ctm_name }}">
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;">Template File 1</label>
										<div id="select-customer-cert" class="col-7">
											@if ($cert->ctm_file_1 != null)
												<a href="{{ url('files/download_temp_file_1/' . $cert->ctm_file_1) }}">
													<span class="badge bg-azure-lt mb-2">File : {{ $cert->ctm_file_1 }}</span>
												</a>
												<a href="{{ url('files/delete_temp_file_1/' . $cert->ctm_file_1) }}">
													<span class="badge bg-red-lt mb-2">Delete</span>
												</a>
											@else
												<span class="badge bg-azure-lt mb-2">File : -</span>
											@endif
											<input type="file" class="form-control mb-1" name="file_upload_temp_cert">
											@error('file_upload_temp_cert')
												<div class="alert alert-danger mb-0">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="mb-3 row" id="area-cert-scd">
										<label class="col-3 col-form-label custom-label" style="text-align: right;">Template File 2</label>
										<div id="select-customer-cert-1" class="col-7">
											@if ($cert->ctm_file_2 != null)
												<a href="{{ url('files/download_temp_file_2/' . $cert->ctm_file_2) }}">
													<span class="badge bg-azure-lt mb-2">File : {{ $cert->ctm_file_2 }}</span>
												</a>
												<a href="{{ url('files/delete_temp_file_2/' . $cert->ctm_file_2) }}">
													<span class="badge bg-red-lt mb-2">Delete</span>
												</a>
											@else
												<span class="badge bg-azure-lt mb-2">File : -</span>
											@endif
											<input type="file" class="form-control mb-1" name="file_upload_temp_cert_scd">
											@error('file_upload_temp_cert_scd')
												<div class="alert alert-danger mb-0">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;"></label>
										<div id="select-customer-area" class="col-7">
											<button class="btn btn-primary">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
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