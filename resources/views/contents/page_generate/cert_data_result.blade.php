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
<li class="breadcrumb-item"><a href="{{ url('generate/new_generate/' . $customer->cst_id) }}">Form generate certificate</a></li>
<li class="breadcrumb-item active"><a href="#">Result Data</a></li>
@endsection
@section('content')
	<div class="row mb-3">
		<div class="col-sm-12">
			<div class="card bg-primary-lt">
				<div class="card-body card-body-custom">
					<div class="row">
						<div class="col-6">
							<strong class="m-0">{{ $customer->cst_name }}</strong>
							<br> <p class="text-muted mb-2">{{ $data_record->rec_name }}</p>
              @if($user->level == 'ADMS' || $user->level == 'ADM')
                <button class="badge bg-orange-lt" data-bs-toggle="modal" data-bs-target="#modal-update-generator"><i class="ri-edit-2-line"></i> Update Data</button>
                @if ($data_record->rec_sync_date === null)
                  <button class="badge bg-red-lt" data-bs-toggle="modal" data-bs-target="#modal-delete-generator"><i class="ri-delete-bin-2-fill"></i> Delete Data</button>
                @endif
              @endif
						</div>
						<div class="col-6 " style="text-align: end;">
							<div>
								@if ($data_record->rec_sync_date == null)
									<strong>Last Sync : -</strong>
								@else
									@php
										$date = date('d M Y H:i:s');
									@endphp
									<strong>Last Sync : {{$date}}</strong>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-custom card-header-light">
					<h3 class="card-title">Result Data</h3>
					<div class="card-actions" style="padding-right: 10px;">
						{{-- ************************************************************************************************** --}}
						<form enctype="multipart/form-data" id="formGenTemplateCert" action="{{ route('tmp_certificate') }}" method="POST">
							@csrf
							<input type="hidden" name="gen_filename" value="{{ $gen_filename }}">
							<input type="hidden" name="dataJson" value="{{ $dataJson }}">
							<input type="hidden" name="tmp_cert" value="{{ $data_record->ctm_file_1 }}">
							<input type="hidden" name="param_cert" id="" value="{{ $data_record->rec_option }}">
						</form>
						{{-- !!! --}}
						{{-- !!! --}}
						<form enctype="multipart/form-data" id="formGenPreprintFront" action="{{ route('tmp_cert_front') }}" method="POST">
							@csrf
							<input type="hidden" name="gen_filename" value="{{ $gen_filename }}">
							<input type="hidden" name="dataJson" value="{{ $dataJson }}">
							<input type="hidden" name="tmp_cert" value="{{ $data_record->ctm_file_1 }}">
							<input type="hidden" name="param_cert" id="" value="{{ $data_record->rec_option }}">
						</form>
						{{-- !!! --}}
						<form enctype="multipart/form-data" id="formGenPreprintback" action="{{ route('tmp_cert_barcode') }}" method="POST">
							@csrf
							<input type="hidden" name="gen_filename" value="{{ $gen_filename }}">
							<input type="hidden" name="dataJson" value="{{ $dataJson }}">
							<input type="hidden" name="tmp_cert" value="{{ $data_record->ctm_file_1 }}">
							<input type="hidden" name="param_cert" id="" value="{{ $data_record->rec_option }}">
						</form>
						<form enctype="multipart/form-data" id="formPushOnline" action="{{ route('action_push_online') }}" method="POST">
							@csrf
							<input type="hidden" name="rec_id" value="{{ $data_record->rec_id }}">
							<input type="hidden" name="dataRecord" value="{{ $dataRecord }}">
							<input type="hidden" name="dataJson" value="{{ $dataJson }}">
							<input type="hidden" name="dataJsonCustomer" value="{{ $dataJsonCustomer }}">
						</form>
						{{-- ************************************************************************************************** --}}
            @if($user->level == 'ADMS' || $user->level == 'ADM')
						<button type="submit" form="formGenTemplateCert" class="btn btn-sm btn-teal btn-square" style="vertical-align: middle;">
							<div style="font-weight: 700;">
								<i class="ri-draft-line icon" style="font-size: 14px; vertical-align: middle;"></i> Digital Certificate
							</div>
						</button>
            @elseif($user->level == 'MKT')
            <button type="submit" form="formGenTemplateCert" class="btn btn-sm btn-teal btn-square" style="vertical-align: middle;">
              <div style="font-weight: 700;">
                <i class="ri-draft-line icon" style="font-size: 14px; vertical-align: middle;"></i> Digital Certificate
              </div>
            </button>
            @endif
						{{-- ************************************************************************************************** --}}
            @if($user->level == 'ADMS' || $user->level == 'ADM')
						<button type="submit" form="formGenPreprintFront" class="btn btn-sm btn-teal btn-square" style="vertical-align: middle;">
							<div style="font-weight: 700;">
								<i class="ri-file-list-3-line icon" style="font-size: 14px; vertical-align: middle;"></i> Pre Print Front Certificate
							</div>
						</button>
            @endif
						{{-- ************************************************************************************************** --}}
            @if($user->level == 'ADMS' || $user->level == 'ADM')
						<button type="submit" form="formGenPreprintback" class="btn btn-sm btn-teal btn-square" style="vertical-align: middle;">
              <div style="font-weight: 700;">
                <i class="ri-file-list-3-line icon" style="font-size: 14px; vertical-align: middle;"></i> Pre Print Barcode Only
							</div>
						</button>
            @endif
						{{-- ************************************************************************************************** --}}
            @if($user->level == 'ADMS' || $user->level == 'ADM')
						<button type="submit" form="formPushOnline" class="btn btn-sm btn-teal btn-square" style="vertical-align: middle;">
              <div style="font-weight: 700;">
                <i class="ri-upload-cloud-2-fill icon" style="font-size: 14px; vertical-align: middle;"></i> Sync
							</div>
						</button>
            @endif
						{{-- ************************************************************************************************** --}}
						<a href="{{ url('generate/customer_cert_generate/' . $customer->cst_id) }}">
							<button class="btn btn-sm btn-danger btn-pill" style="vertical-align: middle;">
								<i class="ri-close-circle-line" style="font-size: 14px; vertical-align: middle;"></i>
							</button>
						</a>
					</div>
				</div>
				<div class="card-body card-body-custom">
					<strong></strong>
					<div id="table-default" class="">
						<table class="table custom-datatables" style="width: 100%;">
							<thead>
								<tr>
									<th style="width: 5%;">No</th>
									<th style="width: 30%;">Name</th>
									<th style="width: 5%;">No. Certificate</th>
									<th style="width: 15%;">Exam Date</th>
									<th style="width: 10%;">Val. Ms. Word</th>
									<th style="width: 10%;">Val. Ms. Excel</th>
									<th style="width: 10%;">Val. Ms. Powerpoint</th>
									<th style="width: 10%;">Opsi</th>
									<th></th>
								</tr>
              </thead>
							<tbody class="table-tbody">
								@php $no = 1; @endphp
								@foreach ($dataList as $list)
									<tr>
										<td>{{ $no }}</td>
										<td>{{ $list['par_name'] }}</td>
										<td>{{ $list['par_cert_number'] }}</td>
										<td>{{ $list['par_exam_date'] }}</td>
										<td>{{ $list['par_val_word'] }}</td>
										<td>{{ $list['par_val_excel'] }}</td>
										<td>{{ $list['par_val_powerpoint'] }}</td>
										<td>
                      @if($user->level == 'ADMS' || $user->level == 'ADM')
                      <button class="badge bg-teal-lt" onclick="actionDet({{ $list['par_id'] }})"><i class="ri-edit-2-line"></i></button>
                      <a href="{{ url('generate/download_cert_base/' . $list['par_id']) }}">
                        <button class="badge bg-blue-lt"><i class="ri-download-2-line"></i></button>
                      </a>
                      <button class="badge bg-indigo-lt" onclick="actionViewBarcode({{ $list['par_id'] }})"><i class="ri-qr-code-line"></i></button>
                      @elseif($user->level == 'MKT')
                      <a href="{{ url('generate/download_cert_base/' . $list['par_id']) }}">
                        <button class="badge bg-blue-lt"><i class="ri-download-2-line"></i></button>
                      </a>
                      <button class="badge bg-indigo-lt" onclick="actionViewBarcode({{ $list['par_id'] }})"><i class="ri-qr-code-line"></i></button>
                      @else
                      <b>--</b>
                      @endif
                    </td>
									</tr>
									@php $no++; @endphp
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="modal-update-participant" class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered mt-1" role="document">
			<div class="modal-content">
				<div class="modal-header" style="min-height: 2.5rem;padding-left: 1rem;">
					<h5 class="modal-title">Update Participant Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="height: 2.5rem;"></button>
				</div>
				<div class="modal-body p-3">
					<form action="{{ route('action-update-participants') }}" id="formContent1" method="post">
						@csrf
						<div class="row">
							<input type="hidden" id="par_id" name="id">
							<div class="col-sm-12 col-xl-12">
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Name</label>
									<div class="col" style="padding: 0px;">
										<input type="text" id="inp_name" name="name" class="form-control p-1" placeholder="Name" autocomplete="off">
									</div>
								</div>
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Certificate Number</label>
									<div class="col" style="padding: 0px;">
										<input type="text" id="inp_number" name="number" class="form-control p-1" placeholder="Certificate number" autocomplete="off">
									</div>
								</div>
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Date 1</label>
									<div class="col" style="padding: 0px;margin-left: 0px;">
										<div class="input-group">
											<span class="input-group-text p-1">
												<i class="ri-calendar-2-line"></i>
											</span>
											<input type="text" id="inp_date" name="date" class="form-control p-1" placeholder="yyyy-mm-dd" autocomplete="off">
											<button type="button" class="btn btn-sm ml-1" onclick="actDelDate1()"><i class="ri-delete-back-2-line"></i></button>
										</div>
									</div>
								</div>
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Date 2</label>
									<div class="col" style="padding: 0px;margin-left: 0px;">
										<div class="input-group">
											<span class="input-group-text p-1">
												<i class="ri-calendar-2-line"></i>
											</span>
											<input type="text" id="inp_date_scd" name="date_scd" class="form-control p-1" placeholder="yyyy-mm-dd" autocomplete="off">
											<button type="button" class="btn btn-sm ml-1" onclick="actDelDate2()"><i class="ri-delete-back-2-line"></i></button>
										</div>
									</div>
								</div>
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Val. Ms. Word</label>
									<div class="col" style="padding: 0px;">
										<input type="text" id="val_word" name="word" class="form-control p-1" placeholder="Value Microsoft Word" >
									</div>
								</div>
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Val. Ms. Excel</label>
									<div class="col" style="padding: 0px;">
										<input type="text" id="val_excel" name="excel" class="form-control p-1" placeholder="Value Microsoft Excel" autocomplete="off">
									</div>
								</div>
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Val. Ms. Powerpoint</label>
									<div class="col" style="padding: 0px;">
										<input type="text" id="val_powerpoint" name="powerpoint" class="form-control p-1" placeholder="Value Microsoft Powerpoint" autocomplete="off">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<div class="col">
					</div>
					<div class="col-auto">
						<button type="button" id="ResetButtonFormFolUp" class="btn btn-sm me-auto" style="margin: 0px; width: 50px;"><i class="ri-refresh-line"></i></button>
						<button type="submit" class="btn btn-sm btn-ghost-primary active" form="formContent1" style="margin:0px; padding-left: 20px;padding-right: 16px;">Update</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="modal-update-generator" class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered mt-1" role="document">
			<div class="modal-content">
				<div class="modal-header" style="min-height: 2.5rem;padding-left: 1rem;">
					<h5 class="modal-title">Update Generator Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="height: 2.5rem;"></button>
				</div>
				<div class="modal-body p-3">
					<form action="{{ route('action-update-record') }}" id="formContent2" method="post">
						@csrf
						<div class="row">
							<input type="hidden" id="rec-id" name="rec_id" value="{{ $data_record->rec_id }}">
							<div class="col-sm-12 col-xl-12">
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Name</label>
									<div class="col" style="padding: 0px;">
										<input type="text" name="name" class="form-control p-1" value="{{ $data_record->rec_name }}" placeholder="Name" autocomplete="off">
									</div>
								</div>
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Notes</label>
									<div class="col" style="padding: 0px;">
										<input type="text" name="notes" class="form-control p-1" value="{{ $data_record->rec_note }}" placeholder="Notes.." autocomplete="off">
									</div>
								</div>
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Certificate Type</label>
									<div class="col" style="padding: 0px;">
										<select name="cert_type" id="cert-type" class="form-control p-1" required="">
											@foreach ($cert_type as $list)
												<option value="{{ $list->cert_id }}" @if ($data_record->rec_cert_type == $list->cert_id) selected @endif>[{{ $list->cert_type }}] {{ $list->cert_title }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="mb-2 mt-0 row" style="margin-right: 0px;">
									<label class="col-3 col-form-label pt-1 pb-1">Select Template</label>
									<div class="col" style="padding: 0px;">
										<select name="cert_template" id="cert-template" class="form-control p-1" required="">
											{{-- <option value="">-</option> --}}
											@foreach ($cert_template as $list)
												@if ($list->ctm_file_1 != null AND $list->ctm_file_2 != null)
													@php $index = 2; @endphp
													<option value="{{ $list->ctm_id }}" @if ($data_record->rec_template == $list->ctm_id) selected @endif >[{{ $index }}] {{ $list->ctm_name }}</option>
												@else
													@php $index = 1; @endphp
													<option value="{{ $list->ctm_id }}"  @if ($data_record->rec_template == $list->ctm_id) selected @endif>[{{ $index }}] {{ $list->ctm_name }}</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<div class="col">
					</div>
					<div class="col-auto">
						<button type="button" id="ResetButtonFormFolUp" class="btn btn-sm me-auto" style="margin: 0px; width: 50px;"><i class="ri-refresh-line"></i></button>
						<button type="submit" class="btn btn-sm btn-ghost-primary active" form="formContent2" style="margin:0px; padding-left: 20px;padding-right: 16px;">Update</button>
					</div>
				</div>
			</div>
		</div>
	</div>
  <div id="modal-delete-generator" class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered mt-1" role="document">
      <div class="modal-content">
        <div class="modal-header" style="min-height: 2.5rem;padding-left: 1rem;">
          <h5 class="modal-title">Delete All Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
            style="height: 2.5rem;"></button>
        </div>
        <div class="modal-body p-3">
          <form action="{{ route('action-delete-record') }}" id="formContent3" method="post">
            @csrf
            <div class="row">
              <input type="hidden" id="rec-id" name="rec_id" value="{{ $data_record->rec_id }}">
              <input type="hidden" id="rec-id" name="cst_id" value="{{ $data_record->rec_customer_id }}">
              <div class="col-sm-12 col-xl-12">
                <p>Anda akan menghapus data report di sesi ini, apakah anda yakin menghapus ?  </p>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="col">
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-sm me-auto" data-bs-dismiss="modal" aria-label="Close"
              style="margin: 0px; width: 50px;">Tidak</button>
            <button type="submit" class="btn btn-sm btn-ghost-danger active" form="formContent3"
              style="margin:0px; padding-left: 20px;padding-right: 16px;">Iya Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="modal-view-qrcode" class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mt-1" role="document">
      <div class="modal-content">
        <div class="modal-header" style="min-height: 2.5rem;padding-left: 1rem;">
          <h5 class="modal-title">View QR-Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
            style="height: 2.5rem;"></button>
        </div>
        <div class="modal-body p-3">
          <div class="row">
            <div class="col-sm-12 col-xl-12 text-center">
              <h3>QR-Code :</h3>
              <span id="qr_code"></span>
              <p class="mt-2 mb-0"><b>Scan QR-Code diatas untuk melihat data peserta.</b></p>
            </div>
          </div>
        </div>
        <div class="mb-3 text-center">
          <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal" aria-label="Close"
            style="margin: 0px; width: 100px;">OK</button>
        </div>
        <div class="modal-footer">
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
	<script>
		const picker_a = new easepick.create({
			element: "#inp_date",
			css: ["{{ asset('plugins/litepicker/bundle/index.css') }}"],
			zIndex: 10,
			format: "YYYY-MM-DD",
			AmpPlugin: {
				resetButton: true,
				darkMode: false
			},
		});
		const picker_b = new easepick.create({
			element: "#inp_date_scd",
			css: ["{{ asset('plugins/litepicker/bundle/index.css') }}"],
			zIndex: 10,
			format: "YYYY-MM-DD",
			AmpPlugin: {
				resetButton: true,
				darkMode: false
			},
		});
	</script>
	<script>
		function actDelDate1() {
			picker_a.clear();
		}
		function actDelDate2() {
			picker_b.clear();
		}
	</script>
	<script>
		function actionDet(id) {
			$.ajaxSetup({
				headers: {
					"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
				}
			});
			$.ajax({
				type: 'POST',
				url: "{{ route('source-data-participant') }}",
				data: { 'id':id },
				success: function (result) {
					$('#par_id').val(result.id);
					$('#inp_name').val(result.name);
					$('#inp_number').val(result.number);
					$('#inp_date').val(result.date);
					$('#inp_date_scd').val(result.date_scd);
					$('#val_word').val(result.word);
					$('#val_excel').val(result.excel);
					$('#val_powerpoint').val(result.powerpoint);
				}
			});
			$('#modal-update-participant').modal('toggle');
		};
    function actionViewBarcode(id) {
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        }
      });
      $.ajax({
        type: 'POST',
        url: "{{ route('source-data-qrcode') }}",
        data: { 'id':id },
        success: function (result) {
          $('#qr_code').html('<img src="' + result.code + '" alt="QR Code" />');
        }
      });
      $('#modal-view-qrcode').modal('toggle');
    };
	</script>

@endpush
