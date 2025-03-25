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
	<li class="breadcrumb-item"><a href="{{ url('generate/customer_cert_generate/' . $customer->cst_id) }}">Generate
			detail</a></li>
	<li class="breadcrumb-item active"><a href="#">Form generate certificate</a></li>
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
					<h3 class="card-title">Form Generate Certificate</h3>
					<div class="card-actions" style="padding-right: 10px;">
						<a href="{{ url('generate/customer_cert_generate/' . $customer->cst_id) }}">
							<button class="btn btn-sm btn-danger btn-pill" style="vertical-align: middle;">
								<i class="ri-close-circle-line" style="font-size: 14px; vertical-align: middle;"></i>
							</button>
						</a>
					</div>
				</div>
				<div class="card-body card-body-custom">
					<form id="formContent1" enctype="multipart/form-data" action="{{ route('action-generate-certificate-new') }}" method="POST" autocomplete="new-password">
						@csrf
						<div class="card-body card-body-custom">
							<div class="row mb-2">
								<div class="col-xl-12">
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;">Name <span style="color:red;">*</span> </label>
										<div id="select-customer-area" class="col-7">
											<input name="name" id="inp-name" type="text" class="form-control" value="{{ old('name') }}"
												required>
											<input name="id" type="hidden" value="{{ $customer->cst_id }}">
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;">Notes</label>
										<div id="select-customer-area" class="col-7">
											<input name="note" id="inp-note" type="text" class="form-control" value="{{ old('note') }}">
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;">Certificate Type <span style="color:red;">*</span></label>
										<div id="select-customer-area" class="col-7">
											<select name="cert_type" id="cert-type" class="form-control" required>
												<option value="{{ null }}">-</option>
												@foreach ($cert_type as $list)
													<option value="{{ $list->cert_id }}">[{{ $list->cert_type }}] {{ $list->cert_title }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;">Select Template <span style="color:red;">*</span></label>
										<div id="select-customer-area" class="col-7">
											<select name="cert_template" id="cert-template" class="form-control" required>
												<option value="{{ null }}">-</option>
												@foreach ($cert_template as $list)
													@if ($list->ctm_file_1 != null AND $list->ctm_file_2 != null)
													@php
													$index = 2;
													@endphp
													@else
													@php
													$index = 1;
													@endphp
													@endif
													<option value="{{ $list->ctm_id }}">[{{ $index }}]{{ $list->ctm_name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;">Option</label>
										<div id="select-customer-area" class="col-7">
											<select name="cert_option" id="cert-option" class="form-control" onchange="actionChange()">
												<option value="GENERAL" {{ old('certificate_type') == 'GENERAL' ? 'selected' : '' }}>General</option>
												<option value="GOLD_SILVER" {{ old('certificate_type') == 'GOLD_SILVER' ? 'selected' : '' }}>Gold-Silver</option>
												<option value="STAMP_COPY" {{ old('certificate_type') == 'STAMP_COPY' ? 'selected' : '' }}>Stamp Copy</option>
											</select>
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;">File Data 1</label>
										<div id="select-customer-area" class="col-7">
											<input type="file" class="form-control mb-1" name="file_upload_1" required>
										</div>
									</div>
									<div id="inp-file-2-container">
										<input type="file" name="file_upload_2" style="display: none;">
									</div>
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;"></label>
										<div id="select-customer-area" class="col-7">
											<a href="{{ url('files/download_template_input_general/' . $customer->cst_id) }}">
												<span class="badge bg-green-lt"><i class="ri-file-excel-2-line icon"></i> Download input template file</span>
											</a>
										</div>
									</div>
									@if (session('error1'))
									<div class="mb-3 row">
										<label class="col-3 col-form-label custom-label" style="text-align: right;"></label>
										<div id="select-customer-area" class="col-7">
											<div class="alert alert-warning" role="alert">{{ session('error1') }}</div>
										</div>
									</div>
									@endif
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
		.custom-datatables tbody tr td {
			padding-top: 4px;
			padding-bottom: 4px;
			padding-left: 0.8rem;
			padding-right: 0.8rem;
		}
		.custom-datatables tbody tr td p {
			margin: 0;
		}
		.custom-datatables-1 tbody tr td {
			padding-top: 3px;
			padding-bottom: 3px;
			padding-left: 0.5rem;
			padding-right: 0.5rem;
		}
		.custom-datatables-1 thead tr th {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-left: 0.5rem;
			padding-right: 0.5rem;
		}
		.custom-datatables-1 tbody tr td p {
			margin: 0px;
		}
		.ts-control {
			padding-bottom: 0.28rem;
			padding-top: 0.28rem;
			padding-left: 0.39rem;
		}

		.ts-input-custom {
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
		.card-body-panel {
			padding: 10px 10px 0px 18px;
		}
		#todo-table thead th {
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
	<script>
		function actionChange() {
			var val_option = $("#cert-option").val();
			if (val_option == 'GOLD_SILVER') {
				$("#inp-file-2-container").empty();
				$("#inp-file-2-container").append(
					'<div class="mb-3 row">'
					+'<label class= "col-3 col-form-label custom-label" style = "text-align: right;" > File Data 2</label>'
					+'<div id="select-customer-area" class="col-7">'
					+'<input type="file" class="form-control mb-1" name="file_upload_2" required>'
					+'</div></div>'
				);
			}else if(val_option == 'GENERAL'){
				$("#inp-file-2-container").empty();
				$("#inp-file-2-container").append('<input type="file" name="file_upload_2" style="display: none;">');
			}else{
				$("#inp-file-2-container").empty();
				$("#inp-file-2-container").append('<input type="file" name="file_upload_2" style="display: none;">');
			}
		};
	</script>
@endpush