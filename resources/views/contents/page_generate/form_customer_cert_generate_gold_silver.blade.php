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
				<form id="formContent1" enctype="multipart/form-data" action="{{ route('action-generate-certificate') }}" method="POST" autocomplete="new-password">
					@csrf
					<div class="card-body card-body-custom">
						<div class="row mb-2">
							<div class="col-xl-12">
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Notes</label>
									<div id="select-customer-area" class="col-7">
										<input name="note" id="user-fullname" type="text" class="form-control">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">File Data Gold</label>
									<div id="select-customer-area" class="col-7">
										<input type="file" class="form-control mb-1" name="file_upload_gold">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">File Data Silver</label>
									<div id="select-customer-area" class="col-7">
										<input type="file" class="form-control mb-1" name="file_upload_silver">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;"></label>
									<div id="select-customer-area" class="col-7">
										<a href="{{ url('files/download_template_input_general/' . $customer->cst_id) }}">
											<span class="badge bg-green-lt"><i class="ri-file-excel-2-line icon"></i> Download input template file</span>
										</a>
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