@php
	$act = Request::get('act');
	if ($act == null) {
		$a = 'none';
	} else {
		$a = $act;
	}
@endphp
@extends('layout.app')
@section('title')
	Customer
@endsection
@section('pagetitle')
	<div class="page-pretitle"></div>
	<h4 class="page-title">Customer</h4>
@endsection
@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">Step one</a></li>
	<li class="breadcrumb-item active"><a href="#">Step two</a></li>
@endsection
@section('content')
	<div class="col-md-12 ">
		<div class="card" style="margin-bottom:150px;">
			<div class="card-header card-header-custom card-header-light">
				<h3 class="card-title">Create User</h3>
				<div class="card-actions" style="padding-right: 10px;">
					<button id="btn-action-reset" class="btn btn-sm btn-light btn-pill" style="vertical-align: middle;" onclick="actionResetFormContent()">
						<div style="font-weight: 700;">
							<i class="ri-eraser-line icon" style="font-size: 14px;margin-right: 4px; vertical-align: middle;"></i> Clear
						</div>
					</button>
					<button id="btn-action-save" class="btn btn-sm btn-light btn-pill" style="vertical-align: middle;" form="formContent1">
						<div style="font-weight: 700;">
							<i class="ri-save-3-line icon" style="font-size: 14px;margin-right: 4px; vertical-align: middle;"></i> Save
						</div>
					</button>
					<a href="{{ url($url_close) }}">
						<button class="btn btn-sm btn-danger btn-pill" style="vertical-align: middle;">
							<div style="font-weight: 700;">
								<i class="ri-close-circle-line icon" style="font-size: 14px; vertical-align: middle;margin-right: 0px;"></i>
							</div>
						</button>
					</a>
				</div>
			</div>
			<form id="formContent1" enctype="multipart/form-data" action="javascript:void(0)" method="Get" autocomplete="off">
				@csrf
				<input type="hidden" name="image" value="{{ null }}">
				<input type="hidden" name="id" value="{{ $data_user->id }}">
				<div class="card-body card-body-custom">
					<div class="row mb-2">
						<div class="col-xl-6">
							<div class="mb-3 row">
								<label class="col-4 col-form-label custom-label" style="text-align: right;">User Fullname</label>
								<div id="select-customer-area" class="col">
									<input name="user_fullname" id="user-fullname" type="text" class="form-control" value="{{ $data_user->name }}">
								</div>
							</div>
							<div class="mb-3 row">
								<label class="col-4 col-form-label custom-label" style="text-align: right;">Mobile</label>
								<div id="select-customer-area" class="col">
									<input name="mobile" id="user-mobile" type="text" class="form-control" value="{{ $data_user->phone }}">
								</div>
							</div>
							<div class="mb-3 row">
								<label class="col-4 col-form-label custom-label" style="text-align: right;">Email</label>
								<div id="select-customer-area" class="col">
									<input name="email" id="user-email" type="text" class="form-control" value="{{ $data_user->email }}">
								</div>
							</div>
							<div class="mb-3 row">
								<label class="col-4 col-form-label custom-label" style="text-align: right;">Address</label>
								<div id="select-customer-area" class="col">
									<input name="address" id="user-address" type="text" class="form-control" value="{{ $data_user->address }}">
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							@if ($user->level == 'MGR')
							<input type="hidden" name="division" value="{{ $data_user->usr_division_id }}">
							<input type="hidden" name="team" value="{{ $data_user->usr_team_id }}">
							<input type="hidden" name="access" value="STF">
							@else
							<div class="mb-3 row">
								<label class="col-4 col-form-label custom-label required">Set Devision</label>
								<div class="col">
									<select type="text" id="select-division" class="form-select ts-input-custom" name="division" placeholder="Select division"  value="">
										<option value="{{ null }}">{{ null }}</option>
										@foreach ($division as $list)
											@if ($list->div_id == $data_user->div_id)
												<option value="{{ $list->div_id }}" selected>{{ $list->div_name }}</option>
											@else
												<option value="{{ $list->div_id }}">{{ $list->div_name }}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label class="col-4 col-form-label custom-label required">Set Team</label>
								<div class="col">
									<select type="text" id="select-team" class="form-select ts-input-custom" name="team" placeholder="Select team"  value="">
										<option value="{{ null }}">{{ null }}</option>
										@foreach ($team as $list)
											@if ($list->uts_id == $data_user->uts_id)
												<option value="{{ $list->uts_id }}" selected>{{ $list->uts_team_name }}</option>
											@else	
												<option value="{{ $list->uts_id }}">{{ $list->uts_team_name }}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label class="col-4 col-form-label custom-label required">Access</label>
								<div class="col">
									<select type="text" id="select-access" class="form-select ts-input-custom" name="access" placeholder="Select access"  value="">
										<option value="{{ null }}">{{ null }}</option>
										@foreach ($access as $key => $list)
											@if ($key == $data_user->level)
												<option value="{{ $key }}" selected>{{ $list }}</option>
											@else
												<option value="{{ $key }}">{{ $list }}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							@endif
							<div class="mb-3 row">
								<label class="col-4 col-form-label custom-label required" style="text-align: right;">Set Username</label>
								<div id="select-customer-area" class="col">
									<input name="username" id="user-username" type="text" class="form-control" value="{{ $data_user->username }}">
								</div>
							</div>
							<div class="mb-3 row">
								<label class="col-4 col-form-label custom-label required">Password</label>
								<div class="col">
									<input name="password" id="user-password" type="password" class="form-control mb-2">
									<label class="form-check" onclick="actioShowPass()">
                    <input class="form-check-input" type="checkbox" id="checkShowPass">
                    <span class="form-check-label">Show Password</span>
                  </label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
@push('style')
<link rel="stylesheet" href="{{ asset('plugins/jquery-confirm/jquery-confirm.min.css') }}">
<style>
	.val-text-param {
		position: relative;
	}
	.val-text-param p {
		margin: 0px;
		position: absolute;
		top: 50%;
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
	}
	.nav-tabs .nav-link {
		border: none;
		color: #ffffffc7;
	}
	.form-control {
		border-radius: 0px;
	}
	.ts-control {
		border-radius: 0px;
	}
	.form-select {
		border-radius: 0px;
	}
	.custom-icon-min-add {
		font-size: 17px;
		color: red;
	}
	.card-header-tabs {
		background-color: #39656b;
	}
	.custom-icon-min {
		font-size: 17px;
	}
	.nav-tabs .nav-link{
		border-radius: 0px;
	}
	.btn-addons {
		padding-top: 2px;
		padding-bottom: 2px;
		border-radius: 0px;
		width: 30px;
		padding-right: 9px;
		padding-left: 9px;
	}
	.typeahead__cancel-button {
		font-size: 24px;
		padding-bottom: 2px;
		border-top-width: 2px;
		padding-top: 6px;
	}
	#photo-frame {
		color: var(--tblr-muted);
		box-sizing: border-box;
		border: 5px solid var(--tblr-border-color);
		padding: 6px;
		margin: auto;
		max-width: 100px;
		max-height: 100px;
		min-height: 122px;
		min-width: 122px;
		border-radius: 10px;
		text-align: center;
	}
	#areaCloseImage {
		text-align: center;
		margin-top: 3px;
	}
	#inputAvatar {
		margin: auto;
		width: 87px;
		height: 100px;
		object-fit: cover;
		z-index: 1;
		/* position: absolute; */
	}
	#closeButton {
		z-index: 2;
		position: ;
		left: 220px;
		top: 180px;
	}
	.custom-label {
		text-align: right;
	}
	.typeahead__field .typeahead__hint,
	.typeahead__field [contenteditable],
	.typeahead__field input,
	.typeahead__field textarea {
		display: block;
		width: 100%;
		padding: 0.4375rem 0.75rem;
		font-family: var(--tblr-font-sans-serif);
		font-size: .875rem;
		font-weight: 400;
		line-height: 1.4285714286;
		color: inherit;
		background-color: var(--tblr-bg-forms);
		background-clip: padding-box;
		border: var(--tblr-border-width) solid var(--tblr-border-color);
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		border-radius: 0px;
		transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
	}
	.typeahead__container button {
		display: inline-block;
		margin-bottom: 0;
		text-align: center;
		-ms-touch-action: manipulation;
		touch-action: manipulation;
		cursor: pointer;
		background-color: #fff;
		border: 1px solid #e6e7e9;
		line-height: 1.25;
		/* padding: 0.5rem 0.75rem; */
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		color: #555;
		padding: 6.5px 7px;
	}
	.typeahead__button button {
		border-top-right-radius: 0px;
		border-bottom-right-radius: 0px;
	}
</style>
@endpush
@push('script')
<script src="{{ asset('plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
<script src="{{ asset('plugins/litepicker/bundle/index.umd.min.js') }}"></script>
<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
{{-- Selection Input --}}
<script>
	var select_division = new TomSelect("#select-division",{
		create: false,			
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-division">'+escape(data.title)+'</div>';
			}
		}
	});
	var select_team = new TomSelect("#select-team",{
		create: false,
		maxItems: 1,
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-team">'+escape(data.title)+'</div>';
			}
		}
	});
	var select_access = new TomSelect("#select-access",{
		persist: false,
		createOnBlur: true,
		create: false,			
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-access">'+escape(data.title)+'</div>';
			}
		}
	});
	/*************************************************************************/
	select_division.on('change',function () {
		var div_id = select_division.getValue();
		actionGetTeam(div_id);
	});
	select_principles.on('change',function () {
		var prd_id = select_principles.getValue();
		actionGetProduct(prd_id);
	});
	/*************************************************************************/
	const picker_d = new easepick.create({
		element: "#est-closing-date",
		css: [ "{{ asset('plugins/litepicker/bundle/index.css') }}" ],
		zIndex: 10,
		format: "YYYY-MM-DD hh:mm a",
		plugins: [
			"TimePlugin","AmpPlugin"
		],
		TimePlugin: {
			format12: true
		},
		AmpPlugin: {
			resetButton: true,
			darkMode: false
		},
	});
	/*************************************************************************/
	var notes_b = tinymce.init({
		selector: 'textarea#notesOpportunity',
		height : "300",
		promotion: false,
		statusbar: false,
		setup: function(editor) {
			editor.on('init',function(e) {
				if (notesOpportunityNotesLOC != null) {
					/* editor.setContent(notesOpportunityNotesLOC); */
				}
			});
			editor.on('input', function(e) {
				notes = editor.getContent();
				localStorage.setItem('notesInputOpportunity', notes);
			});
		}
	});
</script>
{{-- All Class Js --}}
<script>
function actionGetTeam(id) {  
	var dataOption_1 = [];  
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var response = $.ajax({
		type: 'POST',
		url: "{{ route('team-division') }}",
		async: false,
		data: {
			"id": id
		},
		success: function(result) {
			for (let n = 0; n < result.data.length; n++) {
				dataOption_1.push({
					id:result.data[n].id,
					title:result.data[n].title
				});
			}
		}
	});
	select_team.clear();
	select_team.clearOptions();
	select_team.addOptions(dataOption_1);
};
function fcurrencyInput(x) {
	var input_field = document.getElementById(x);
	input_field.value = formatRupiah(input_field.value, "Rp");
}
function formatRupiah(angka, prefix) {
	var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if (ribuan) {
		separator = sisa ? "." : "";
		rupiah += separator + ribuan.join(".");
	}
	rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
};
function actionGetProject(id) {
	var dataOption_1 = [];  
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var response = $.ajax({
		type: 'POST',
		url: "{{ route('customer-project') }}",
		async: false,
		data: {
			"id": id
		},
		success: function(result) {
			for (let n = 0; n < result.data.length; n++) {
				dataOption_1.push({
					id:result.data[n].id,
					title:result.data[n].title
				});
			}
		}
	});
	select_lead.clear();
	select_lead.clearOptions();
	select_lead.addOptions(dataOption_1);
};
function actionGetProduct(id) {  
	var dataOption_2 = [];  
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var response = $.ajax({
		type: 'POST',
		url: "{{ route('product-principle') }}",
		async: false,
		data: {
			"id": id
		},
		success: function(result) {
			for (let n = 0; n < result.product.length; n++) {
				dataOption_2.push({
					id:result.product[n].id,
					title:result.product[n].title
				});
			}
		}
	});
	select_products.clear();
	select_products.clearOptions();
	select_products.addOptions(dataOption_2);
};
function actioShowPass() {  
	var check_param = document.getElementById("user-password");
  if (check_param.type === "password") {
    check_param.type = "text";
  } else {
    check_param.type = "password";
  }
};
</script>
{{-- Onload Js --}}
<script>
$(document).ready(function() {
	$("#formContent1").submit(function(e) {
		e.preventDefault();
		var formData1 = new FormData(this);
		$.ajaxSetup({
			headers: {
				"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
			}
		});
		$.ajax({
			type: "POST",
			url: "{{ route('store-update-users') }}",
			data: formData1,
			cache: false,
			contentType: false,
			processData: false,
			success: function(result) {
				if (result.param == true) {
					$.confirm({
						type: 'green',
						title: 'Success',
						content: 'Data stored in database.',
						animateFromElement: false,
						animation: 'opacity',
						closeAnimation: 'opacity',
						buttons: {
							goToLead:{
								text:"OK",
								action:function () {  
									window.location.href = "{{ url('setting/user') }}/"+result.id_user;
								}
							},
						}
					});
				} else if(result.param == 'manager_already') {
					$.confirm({
						type: 'orange',
						title: 'Attention',
						content: 'This team manager is already, the rule manager just one on one team.',
						animateFromElement: false,
						animation: 'opacity',
						closeAnimation: 'opacity',
						buttons: {
							goToLead:{
								text:"OK",
								action:function () {  
									window.location.href = "{{ url('setting/user') }}/"+result.id_user;
								}
							}
						}
					});
				}
			}
		});
	});
	/*======================================================================*/
});
</script>
@endpush
