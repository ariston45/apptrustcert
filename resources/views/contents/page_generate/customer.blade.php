
@extends('layout.app')
@section('title')
Home
@endsection
@section('pagetitle')
<div class="page-pretitle"></div>
<h4 class="page-title">Generate Certificate</h4>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="#">Generate certificate</a></li>
@endsection
@section('content')
	<div class="row">
	</div>
	<div class="row">
		<div class="col-md-12 ">
			<div class="card">
				<div class="card-header card-header-custom card-header-light">
					<h3 class="card-title">Customer Data</h3>
					<div class="card-actions" style="padding-right: 10px;">
            @if($user->level == 'ADMS' || $user->level == 'ADM')
						<a href="{{ url('generate/create-customer') }}">
							<button class="btn btn-sm btn-primary btn-pill btn-light" style="vertical-align: middle;">
								<div style="font-weight: 700;">
									<i class="ri-add-circle-line icon" style="font-size: 14px; vertical-align: middle;"></i> Add Customer
								</div>
							</button>
						</a>
            @endif
					</div>
				</div>
				<div class="card-body card-body-custom">
          <div class="row">
            <div class="col-md-12 mb-3">
              {{-- <input class="form-check-input" type="checkbox" name="param_cst_id" value=""> Check All Data || --}}
              <button type="submit" form="formAddList" class="badge bg-teal text-teal-fg"><i class="ri-menu-add-fill"></i> Add to Mylist</button>
            </div>
          </div>
					<div id="table-default" class="">
            <form enctype="multipart/form-data" id="formAddList" action="{{ route('add-customer-to-mylist') }}" method="POST">
              @csrf
              <table class="table custom-datatables" id="customer-table" style="width: 100%;">
                <thead>
                  <tr>
                    <th style="width: 30%;">
                      <input class="form-check-input" type="checkbox" name="param_cst_id" value="" id="checkAll" style="margin-right: 5px; margin-left: 3px; margin-top: 0px;">
                      Customer Name
                    </th>
                    <th style="width: 10%;">Phone</th>
                    <th style="width: 15%;">Email</th>
                    <th style="text-align: center; width: 15%">MENU</th>
                  </tr>
                </thead>
                <tbody class="table-tbody"></tbody>
              </table>
            </form>
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
@if($user->level == 'ADMS' || $user->level == 'ADM')
  <script>
    var sourceLink = "{{ route('source-data-customer') }}";
  </script>
@elseif($user->level == 'MKT')
  <script>
    var sourceLink = "{{ route('source-data-customer-ii') }}";
  </script>
@endif

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
			$('#customer-table').DataTable({
				processing: true, serverSide: true, responsive: true,paging: false,
				pageLength: 15,
				lengthMenu: [[15, 30, 60, -1], [15, 30, 60, "All"]],
				language: {
					lengthMenu: "Show  _MENU_",
					search: "Find Customer"
				},
				ajax: {
					'url': sourceLink,
					'type': 'POST',
					'data': {
						'_token': '{{ csrf_token() }}',
						'id': id
					}
				},
				order: [[0, 'asc']],
				columns: [
					{ data: 'customer', name: 'customer', orderable: false, searchable: true },
					{ data: 'phone', name: 'phone', orderable: true, searchable: true },
					{ data: 'email', name: 'email', orderable: true, searchable: true },
					{ data: 'menu', name: 'menu', orderable: false, searchable: false },
				]
			});
		}
	</script>
	<script>
		mainDataCustomer();
	</script>
  <script>
    $(document).ready(function() {
      // Ketika checkbox "Check All" diklik
      $('#checkAll').on('change', function() {
        $('.ck_cst').prop('checked', this.checked);
      });
      // Ketika salah satu checkbox "ck_cst" diklik
      $('.ck_cst').on('change', function() {
      // Kalau semua ck_cst tercentang, maka checkAll juga ikut centang
        if ($('.ck_cst:checked').length === $('.ck_cst').length) {
          $('#checkAll').prop('checked', true);
        } else {
          $('#checkAll').prop('checked', false);
        }
      });
    });
  </script>
@endpush
