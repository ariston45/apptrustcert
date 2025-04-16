@extends('layout.app')
@section('title')
Home
@endsection
@section('pagetitle')
<div class="page-pretitle"></div>
<h4 class="page-title">Add User</h4>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('generate') }}">Setting User</a></li>
<li class="breadcrumb-item active"><a href="#">Update user</a></li>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 ">
		<div class="card">
			<div class="card-header card-header-custom card-header-light">
				<h3 class="card-title">Form Add User</h3>
				<div class="card-actions" style="padding-right: 10px;">
					<a href="{{ url('setting/certificate') }}">
						<button class="btn btn-sm btn-danger btn-pill" style="vertical-align: middle;">
							<i class="ri-close-circle-line" style="font-size: 14px; vertical-align: middle;"></i>
						</button>
					</a>
				</div>
			</div>
			<div class="card-body card-body-custom">
				<form id="formContent1" enctype="multipart/form-data" action="{{ route('action-add-user') }}" method="POST" autocomplete="new-password">
					@csrf
					<div class="card-body card-body-custom">
						<div class="row mb-2">
							<div class="col-xl-12">
                <div class="mb-3 row">
                  <label class="col-3 col-form-label custom-label" style="text-align: right;">Name</label>
                  <div class="col-7">
                    {{-- <input type="hidden" name="id" value="{{ $user->id }}"> --}}
                    <input name="name" id="inp-name" type="text" class="form-control" value="" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-3 col-form-label custom-label" style="text-align: right;">Username</label>
                  <div class="col-7">
                    <input name="username" id="inp-username" type="text" class="form-control" value="" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-3 col-form-label custom-label" style="text-align: right;">Email</label>
                  <div class="col-7">
                    <input name="email" id="inp-email" type="text" class="form-control" value="">
                  </div>
                </div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Rule Level</label>
									<div id="select-customer-name" class="col-7">
										<select name="level" id="sel-level" class="form-control">
											<option value="{{ null }}">-</option>
											<option value="ADMS">Administrator</option>
											<option value="ADM">Admin Data</option>
											<option value="MKT">Marketing</option>
										</select>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-3 col-form-label custom-label" style="text-align: right;">Password</label>
									<div class="col-7">
										<input name="password" id="inp-password" type="password" class="form-control" value="" autocomplete="new-password" required>
									</div>
								</div>
                <div class="mb-3 row">
                  <label class="col-3 col-form-label custom-label" style="text-align: right;">Retype Password</label>
                  <div class="col-7">
                    <input name="confirm_password" id="inp-confirm-password" type="password" class="form-control" value="" autocomplete="new-password" required>
                  </div>
                </div>
                @if(session('password_mismatch'))
                <div class="mb-3 row">
                  <div class="col-3"></div>
                  <div class="col-7">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <div class="d-flex">
                        <div>
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 8v4"></path>
                            <path d="M12 16h.01"></path>
                          </svg>
                        </div>
                        <div>
                          {{ session('password_mismatch') }}
                        </div>
                      </div>
                      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                  </div>
                </div>
                @endif
                @if(session('success'))
                <div class="mb-3 row">
                  <div class="col-3"></div>
                  <div class="col-7">
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <div class="d-flex">
                        <div>
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                          </svg>
                        </div>
                        <div>
                          {{ session('success') }}
                        </div>
                      </div>
                      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
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
	.alert-box {
  display: flex;
  align-items: center;
  border: 1px solid red;
  border-left: 4px solid red;
  background-color: #fff;
  color: red;
  padding: 10px 12px;
  border-radius: 4px;
  position: relative;
  font-family: Arial, sans-serif;
  margin: 10px 0;
  }

  .alert-box .icon {
  margin-right: 8px;
  font-size: 18px;
  }

  .alert-box .message {
  flex: 1;
  }

  .alert-box .close-btn {
  margin-left: 12px;
  cursor: pointer;
  font-size: 16px;
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
