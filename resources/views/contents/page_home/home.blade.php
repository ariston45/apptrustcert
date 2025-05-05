@extends('layout.app')
@section('title')
Home
@endsection
@section('pagetitle')
<div class="page-pretitle"></div>
<h4 class="page-title">Home</h4>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="#">Home</a></li>
@endsection
@section('content')
<div class="row">
</div>
<div class="row">
	<div class="col-xl-12 mb-3">
		<div class="card">
      <div class="card-header card-header-custom card-header-light">
        <h3 class="card-title">Customer Data</h3>
        <div class="card-actions" style="padding-right: 10px;">
        </div>
      </div>
      <div class="card-body card-body-custom">
        <div class="row">
          <div class="col-md-12 mb-3">
            {{-- <input class="form-check-input" type="checkbox" name="param_cst_id" value=""> Check All Data || --}}
            <button type="submit" form="formAddList" class="badge bg-purple text-purple-fg"><i class="ri-delete-bin-5-line"></i> Remove from Mylist</button>
          </div>
        </div>
        <div id="table-default" class="">
          <form enctype="multipart/form-data" id="formAddList" action="{{ route('remove-customer-to-mylist') }}" method="POST">
            @csrf
            <table class="table custom-table" id="example-table" style="width: 100%;">
              <thead>
                <tr>
                  <th style="width: 5%;">
                    <input class="form-check-input" type="checkbox" name="param_cst_id" value="" id="checkAll">
                  </th>
                  <th style="width: 35%;">Customer Name</th>
                  <th style="width: 20%;">Phone</th>
                  <th style="width: 20%">Email</th>
                  <th style="width: 20%">Option</th>
                </tr>
              </thead>
              <tbody id="sortable-table">
                @foreach ($colect_data as $key => $value)
                <tr>
                  <td>
                    <input class="form-check-input ck_cst" type="checkbox" name="cst_id[]" value="{{ $value->cst_id }}">
                    <input class="form-check-input ck_cst" type="hidden" name="cst_id_sort[]" value="{{ $value->cst_id }}">
                  </td>
                  <td>
                    <b>
                      {{ $value->cst_name }}
                    </b>
                    <input type="hidden" name="param_cst_id[]" value="{{ $value->cst_id }}">
                  </td>
                  <td>{{ $value->cst_phone }}</td>
                  <td>{{ $value->cst_email }}</td>
                  <td>
                    @if($user->level == 'ADMS' || $user->level == 'ADM')
                      <a href="{{ url('generate/customer_cert_generate') }}/{{ $value->cst_id }}">
                        <button type="button" class="badge bg-blue text-blue-fg"><i class="ri-file-shield-2-fill icon"></i> Generate</button>
                      </a>
                      <a href="{{ url('generate/customer_cert_template') }}/{{ $value->cst_id }}">
                        <button type="button" class="badge bg-orange text-orange-fg"><i class="ri-file-list-3-fill icon"></i> Template</button>
                      </a>
                    @else
                      <a href="{{ url('generate/customer_cert_generate') }}/{{ $value->cst_id }}">
                        <button type="button" class="badge bg-blue-lt w-100"><i class="ri-file-shield-2-fill icon"></i> Generates</button>
                      </a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
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
<link rel="stylesheet" href="{{ asset('customs/css/style_datatables.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
<link rel="stylesheet" href="{{ url('plugins/tabulator/css/tabulator.min.css') }}">
<style>
  .custom-table thead tr th{
    padding-top: 8px;
    background-color: #056ec4;
    color: aliceblue;
  }
	.custom-table tbody tr td{
		padding-top: 4px;
		padding-bottom: 4px;
		padding-left: 0.8rem;
		padding-right: 0.8rem;
	}
	.custom-table tbody tr td p{
		margin: 0;
	}
  .custom-table tbody tr.dragging {
  background-color: #48a8f7;
  }
  tbody td:nth-child(1) {
    background-color: #81D4FA;
  }
  tbody td:nth-child(2) {
    background-color: #BBDEFB;
  }
  tbody td:nth-child(3) {
    background-color: #E1F5FE;
  }
  tbody td:nth-child(4) {
    background-color: #E1F5FE;
  }
  tbody td:nth-child(5) {
    background-color: #E1F5FE;
  }

</style>
@endpush

@push('script')
{{-- Script Extend --}}
{{-- <script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
<script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script> --}}
{{-- !! --}}
{{-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ url('plugins/tabulator/js/tabulator.min.js') }}"></script>
<script type="text/javascript" src="{{ url('plugins/tabulator/js/jquery_wrapper.js') }}"></script> --}}
<script src="{{ url('plugins/sortable/Sortable.js') }}"></script>
<script>
  new Sortable(document.getElementById('sortable-table'), {
    animation: 150,
    onStart: (evt) => {
      evt.item.classList.add("dragging");
    },
    onEnd: (evt) => {
      evt.item.classList.remove("dragging");
      updateRowNumbers();
      var sortValues = [];
      $('input[name="cst_id_sort[]"]').each(function() {
        sortValues.push($(this).val());
      });
      storeNewSort(sortValues);
    }
  });

  function updateRowNumbers() {
    const rows = document.querySelectorAll("#sortable-table tr");
  };
  function storeNewSort(params) {
    $.ajax({
      type: "POST",
      url: "{{ route('update-sort-customer-byuser') }}",
      data: {
        _token: '{{ csrf_token() }}',
        params: params
      },
      success: function(response) {
        console.log("Data berhasil disimpan:", response);
      },
      error: function(xhr, status, error) {
        console.error("Terjadi kesalahan saat menyimpan data:", error);
      }
    });
  }
</script>
<script>
  $(document).ready(function() {
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
  // Ketika checkbox "Check All" diklik
</script>
{{-- !! --}}
{{-- <script>
  var id = "";
  var table = new DataTable('#customer-table',{
    rowReorder: {
      dataSrc: 'customer',
    },
    processing: true, serverSide: true, responsive: true,
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
    columns: [
      { data: 'id', name: 'id',visible:false },
      { data: 'customer', name: 'customer',  },
      { data: 'phone', name: 'phone',  },
      { data: 'email', name: 'email',  },
      { data: 'menu', name: 'menu',},
    ],
    drawCallback: function () {
      oldOrder = table.rows().data().toArray().map(row => row.id);
      console.log(oldOrder);
    }
  });
  $('#myTable_filter input').addClass('form-control custom-datatables-filter');
  $('#myTable_length select').addClass('form-control form-select custom-datatables-leght');
  $('#customer-table').on('row-reorder', function (e, diff, edit) {
    console.log('event triggered', diff);
  });
</script> --}}
{{-- <script>
  var dataOption_1 = [];
  var id = "";
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var response = $.ajax({
    type: 'POST',
    url: "{{ route('source-data-customer-userlist') }}",
    async: false,
    data: {
      "id": id
    },
    success: function(result) {
      for (let n = 0; n < result.length; n++) {
        dataOption_1.push({
          id:result[n].id,
          customer:result[n].customer,
          phone:result[n].phone,
          email:result[n].email,
          // menu:result[n].menu,
        });
      }
    }
  });
  var table = new Tabulator("#example-table", {
    movableRows:true,
    movableColumns:true, //allow column order to be changed
    movableRowsHandle: true,
    rowMoved:function(row){
      var data = row.getTable().getData(); // data terbaru setelah diurut ulang
      console.log("Baris dipindah!", data);
    },
    data:dataOption_1, //load row data from array
    layout:"fitColumns", //fit columns to width of table
    responsiveLayout:"hide", //hide columns that don't fit on the table
    addRowPos:"top", //when adding a new row, add it to the top of the table
    history:true, //allow undo and redo actions on the table
    pagination:"local", //paginate the data
    paginationSize:7, //allow 7 rows per page of data
    paginationCounter:"rows", //display count of paginated rows in footer
    initialSort:[ //set the initial sort order of the data
      {column:"name", dir:"asc"},
    ],
    columnDefaults:{
      tooltip:true, //show tool tips on cells
    },
    columns:[ //define the table columns
      {formatter:"handle", headerSort:false, width:30, hozAlign:"center"},
      {title:"Customer", field:"customer",},
      {title:"Email", field:"email",},
      {title:"Phone", field:"phone",},
      {
        title:"Aksi",
        formatter: function(cell){
          var id = cell.getRow().getData().id;
          return "<a href='{!! url('generate/customer_cert_generate') !!}/"+id+"'><button type='button' class='badge bg-blue text-blue-fg'>Generate</button></a>";
        },
        hozAlign:"center",
      },
      {title:"ID", field:"id", visible:false},
    ],
  });
</script> --}}
@endpush
