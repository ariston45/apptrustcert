@extends('layout.app')
@section('title')
Home
@endsection
@section('pagetitle')
<div class="page-pretitle"></div>
<h4 class="page-title">Update Customer</h4>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('generate') }}">Generate certificate</a></li>
<li class="breadcrumb-item active"><a href="#">Update customer</a></li>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 ">
		<div class="card">
			<div class="card-header card-header-custom card-header-light">
				<h3 class="card-title">Form Update Customer</h3>
				<div class="card-actions" style="padding-right: 10px;">
					<a href="{{ url('generate') }}">
						<button class="btn btn-sm btn-danger btn-pill" style="vertical-align: middle;">
							<i class="ri-close-circle-line" style="font-size: 14px; vertical-align: middle;"></i>
						</button>
					</a>
				</div>
			</div>
			<div class="card-body card-body-custom">
				<form id="formContent1" enctype="multipart/form-data" action="{{ route('action-update-customer') }}" method="POST" autocomplete="new-password">
					@csrf
					<div class="card-body card-body-custom">
						<div class="row mb-2">
							<div class="col-xl-12">
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Customer Name</label>
									<div id="select-customer-area" class="col-7">
										<input name="inp_name" id="inp-name" type="text" class="form-control" value="{{ $customer->cst_name }}">
										<input name="cst_id" type="hidden" value="{{ $customer->cst_id }}">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Phone</label>
									<div id="select-customer-area" class="col-7">
										<input name="inp_phone" id="inp-phone" type="text" class="form-control" value="{{ $customer->cst_phone }}">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Email</label>
									<div id="select-customer-area" class="col-7">
										<input name="inp_email" id="inp-email" type="text" class="form-control" value="{{ $customer->cst_email }}">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Address</label>
									<div id="select-customer-area" class="col-7">
										<input name="inp_address" id="inp-address" type="text" class="form-control" value="{{ $customer->cst_address }}">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Certificate Type</label>
									<div id="select-customer-area" class="col-7">
										<select name="certificate_type" id="" class="form-control">
											<option value="GENERAL" {{ $customer->cst_sts_custom_certificate == 'GENERAL' ? 'selected' : '' }}>General</option>
											<option value="GOLD_SILVER" {{ $customer->cst_sts_custom_certificate == 'GOLD_SILVER' ? 'selected' : '' }}>Gold-Silver</option>
											<option value="STAMP_COPY" {{ $customer->cst_sts_custom_certificate == 'STAMP_COPY' ? 'selected' : '' }}>Stamp Copy</option>
										</select>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Input Data Template File</label>
									<div id="select-customer-area" class="col-7">
										@if ($customer->cst_sts_custom_input == 'true')
											<a href="{{ url('files/download_template_input_general/' . $customer->cst_id) }}">
												<span class="badge bg-azure-lt mb-2">File : {{ $customer->cst_file_custom_input }}</span>
											</a>
											<a href="{{ url('files/delete_template_input_general/' . $customer->cst_id) }}">
												<span class="badge bg-red-lt mb-2">Delete</span>
											</a>
										@else
										<span class="badge bg-azure-lt mb-2">File : -</span>
										@endif
										<input type="file" class="form-control mb-1" name="file_upload_temp_input">
										@error('file_upload_temp_input')
											<div class="alert alert-danger mb-0">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Certificate Template File</label>
									<div id="select-customer-area" class="col-7">
										@if ($customer->cst_file_custom_certificate != null)
											<a href="{{ url('files/download_template_cert/' . $customer->cst_id) }}">
												<span class="badge bg-azure-lt mb-2">File : {{ $customer->cst_file_custom_certificate }}</span>
											</a>
											<a href="{{ url('files/delete_template_cert/' . $customer->cst_id) }}">
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
		$('#myTable_filter input').addClass('form-control custom-datatables-filter');
		$('#myTable_length select').addClass('form-control form-select custom-datatables-leght');
		function mainDataCustomer() {
			var id = "";
			$('#gen-record-table').DataTable({
				processing: true, serverSide: true, responsive: true,
				pageLength: 15,
				lengthMenu: [[15, 30, 60, -1], [15, 30, 60, "All"]],
				language: {
					lengthMenu: "Show  _MENU_",
					search: "Find Customer"
				},
				ajax: {
					'url': '{!! route("source-data-gen-record") !!}',
					'type': 'POST',
					'data': {
						'_token': '{{ csrf_token() }}',
						'id': id
					}
				},
				order: [[0, 'asc']],
				columns: [
					{ data: 'date', name: 'date', orderable: true, searchable: true },
					{ data: 'count', name: 'count', orderable: true, searchable: true },
					{ data: 'note', name: 'note', orderable: true, searchable: true },
					{ data: 'menu', name: 'menu', orderable: false, searchable: false },
				]
			});
		}
	</script>
	<script>
		mainDataCustomer();
	</script>
@endpush