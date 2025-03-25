@extends('layout.app')
@section('title')
	Customer
@endsection
@section('pagetitle')
	<div class="page-pretitle"></div>
	<h4 class="page-title">Settings: User</h4>
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">Step one</a></li>
	<li class="breadcrumb-item active"><a href="#">Step two</a></li>
@endsection
@section('content')
<div class="col-md-12 ">
	<div class="card">
		<div class="card-header card-header-custom card-header-light">
			<h3 class="card-title">Users Data</h3>
			<div class="card-actions" style="padding-right: 10px;">
				<a href="{{ url('setting/create-user') }}">
					<button class="btn btn-sm btn-primary btn-pill btn-light" style="vertical-align: middle;">
						<div style="font-weight: 700;">
							<i class="ri-add-circle-line icon" style="font-size: 14px; vertical-align: middle;"></i> Create
						</div>
					</button>
				</a>
			</div>
		</div>
		<div class="card-body card-body-custom">
			<div id="table-default" class="">
				<table class="table custom-datatables" id="customer-table" style="width: 100%;">
					<thead>
						<tr>
							{{-- <th></th> --}}
							<th style="width: 20%;">FULLNAME</th>
							<th style="width: 20%;">USERNAME</th>
							<th style="text-align: center; width: 15%;">TEAM</th>
							<th style="text-align: center; width: 15%;">DEVISION</th>
							<th style="text-align: center; width: 10%;">ACCESS</th>
							<th style="text-align: center; width: 10%">MENU</th>
						</tr>
					</thead>
					<tbody class="table-tbody"></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@push('style')
<link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('customs/css/style_datatables.css') }}">
<style>
	.custom-datatables tbody tr td{
		padding-top: 4px;
		padding-bottom: 4px;
	}
	.paginate_button .current {
		background-color: red;
	}
</style>
@endpush
@push('script')
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
{{-- Datatables --}}
<script>
$('#myTable_filter input').addClass('form-control custom-datatables-filter');
$('#myTable_length select').addClass('form-control form-select custom-datatables-leght');
function mainDataLeads() {
	var id = "";
	$('#customer-table').DataTable({
		processing: true,serverSide: true,responsive: true,
		pageLength: 15,
		lengthMenu: [ [15, 30, 60, -1], [15, 30, 60, "All"] ],
		language: {
			lengthMenu : "Show  _MENU_",
			search: "Find Opportunity"
		},
		ajax: {
			'url': '{!! route("source-users") !!}',
			'type': 'POST',
			'data': {
				'_token': '{{ csrf_token() }}',
				'id' : id
			}
		},
		columnDefs: [
			{
				"targets": 2, 
        "className": "text-center",
			},
			{
				"targets": 3, 
        "className": "text-center",
			},
			{
				"targets": 4, 
        "className": "text-center",
			}
		],
		order:[[0,'asc']],
		columns: [
			{data: 'name', name: 'name', orderable: true, searchable: true },
			{data: 'username', name: 'username', orderable: true, searchable: true },
			{data: 'team_name', name: 'team_name', orderable: true, searchable: true },
			{data: 'div_name', name: 'div_name', orderable: true, searchable: true },
			{data: 'level', name: 'level', orderable: true, searchable: true },
			{data: 'menu', name: 'menu', orderable: false, searchable: false },
		]
	});	
}
</script>
<script>
mainDataLeads();
</script>
@endpush
