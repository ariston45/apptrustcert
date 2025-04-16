@extends('layout.app')
@section('title')
Home
@endsection
@section('pagetitle')
<div class="page-pretitle"></div>
<h4 class="page-title">Setting User</h4>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="#">Setting User</a></li>
@endsection
@section('content')
<div class="row">
</div>
<div class="row">
	<div class="col-xl-12 mb-3">
		<div class="card card-panel">
			<div class="card-body bg-cyan-lt card-body-panel">
				<div class="row">
					<div class="col-xl-2 col-md-3 col-sm-6 item-panel-value" style="padding-left: 0px;">
            <a href="{{ url('setting/certificate') }}">
              <div class="card card-sm">
                <div class="card-body p-2">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-blue text-white avatar p-1">
                        {{-- <img src="{{ getIcon('co_lead.svg') }}" alt=""> --}}
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                      </div>
                      <div class="text-muted">
                        Certificate
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-xl-2 col-md-3 col-sm-6 item-panel-value" style="padding-left: 0px;">
            <a href="{{ url('setting/user') }}">
              <div class="card card-sm">
                <div class="card-status-bottom bg-success">
                </div>
                <div class="card-body p-2">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-purple text-white avatar p-1">
                        {{-- <img src="{{ getIcon('co_briefcas.svg') }}" alt=""> --}}
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                      </div>
                      <div class="text-muted">
                        User
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-xl-2 col-md-3 col-sm-6 item-panel-value" style="padding-left: 0px;">
            <div class="card card-sm">
              <div class="card-body p-2">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-red text-white avatar p-1">
                      {{-- <img src="{{ getIcon('co_all.svg') }}" alt=""> --}}
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                    </div>
                    <div class="text-muted">
                      Other
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
<div class="col-md-12 ">
	<div class="card">
		<div class="card-header card-header-custom card-header-light">
			<h3 class="card-title">User</h3>
			<div class="card-actions" style="padding-right: 10px;">
				<a href="{{ url('setting/certificate/sync') }}">
					<button class="btn btn-sm btn-primary btn-pill btn-light" style="vertical-align: middle;">
						<div style="font-weight: 700;">
							Sync
						</div>
					</button>
				</a>
				<a href="{{ url('setting/user/add-user') }}">
					<button class="btn btn-sm btn-primary btn-pill btn-light" style="vertical-align: middle;">
						<div style="font-weight: 700;">
							<i class="ri-add-circle-line icon" style="font-size: 14px; vertical-align: middle;"></i> Add User
						</div>
					</button>
				</a>
			</div>
		</div>
		<div class="card-body card-body-custom">
			<div id="table-default" class="">
				<table class="table custom-datatables" id="cert-table" style="width: 100%;">
					<thead>
						<tr>
							<th style="width: 30%;">Name</th>
							<th style="width: 30%;">Username</th>
              <th style="width: 30%;">Email</th>
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
	function mainDataCert() {
		var id = "";
		$('#cert-table').DataTable({
			processing: true, serverSide: true, responsive: true,
			pageLength: 15,
			lengthMenu: [[15, 30, 60, -1], [15, 30, 60, "All"]],
			language: {
				lengthMenu: "Show  _MENU_",
				search: "Find Customer"
			},
			ajax: {
				'url': '{!! route("source-data-user") !!}',
				'type': 'POST',
				'data': {
					'_token': '{{ csrf_token() }}',
					'id': id
				}
			},
			order: [[0, 'asc']],
			columns: [
				{ data: 'name', name: 'name', orderable: true, searchable: true },
        { data: 'username', name: 'username', orderable: true, searchable: true },
        { data: 'email', name: 'email', orderable: true, searchable: true },
				{ data: 'menu', name: 'menu', orderable: true, searchable: true },
			]
		});
	}
</script>
<script>
	mainDataCert();
</script>
@endpush
