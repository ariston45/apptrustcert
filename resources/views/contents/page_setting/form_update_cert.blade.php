@extends('layout.app')
@section('title')
Home
@endsection
@section('pagetitle')
<div class="page-pretitle"></div>
<h4 class="page-title">Add Customer</h4>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('generate') }}">Generate certificate</a></li>
<li class="breadcrumb-item active"><a href="#">Add Certificate</a></li>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 ">
		<div class="card">
			<div class="card-header card-header-custom card-header-light">
				<h3 class="card-title">Form Add Certificate</h3>
				<div class="card-actions" style="padding-right: 10px;">
					<a href="{{ url('setting/certificate') }}">
						<button class="btn btn-sm btn-danger btn-pill" style="vertical-align: middle;">
							<i class="ri-close-circle-line" style="font-size: 14px; vertical-align: middle;"></i>
						</button>
					</a>
				</div>
			</div>
			<div class="card-body card-body-custom">
				<form id="formContent1" enctype="multipart/form-data" action="{{ route('action-update-cert') }}" method="POST" autocomplete="new-password">
					@csrf
					<div class="card-body card-body-custom">
						<div class="row mb-2">
							<div class="col-xl-12">
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Certificate Type</label>
									<div id="select-customer-name" class="col-7">
										<select name="cert_type" id="cert-type" class="form-control">
											<option value="{{ null }}">-</option>
											<option value="COP" {{ $data->cert_type == 'COP' ? 'selected' : '' }}>Certificate Of Proficiency </option>
											<option value="COA" {{ $data->cert_type == 'COA' ? 'selected' : '' }}>Certificate Of Achievement</option>
											<option value="COC" {{ $data->cert_type == 'COC' ? 'selected' : '' }}>Certificate Of Competence</option>
										</select>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Certificate Title</label>
									<div id="select-customer-phone" class="col-7">
										<input type="hidden" name="cert_id" value="{{ $data->cert_id }}">
										<input name="cert_title" id="inp-title" type="text" class="form-control" value="{{ $data->cert_title }}">
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
	<script>
		function actionChange() {
			var selectedValue = $('#certificate-type').val();
			console.log(selectedValue);

			if (selectedValue == 'GOLD_SILVER') {
				$('#area-cert-scd').fadeIn();
			}else{
				$('#area-cert-scd').fadeOut();
			}
		}
	</script>

@endpush