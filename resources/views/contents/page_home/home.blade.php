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
		<div class="card card-panel">
			<div class="card-body bg-cyan-lt card-body-panel">
				<div class="row">
					@if (checkRule(['ADM','AGM','MGR.PAS','MGR','STF']))
					<div class="col-xl-2 col-md-3 col-sm-6 item-panel-value" style="padding-left: 0px;">
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
											Lead
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-2 col-md-3 col-sm-6 item-panel-value" style="padding-left: 0px;">
						<div class="card card-sm">
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
											Opportunities
										</div>
									</div>
								</div>
							</div>
						</div>
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
											Purchase
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-2 col-md-3 col-sm-6 item-panel-value" style="padding-left: 0px;">
						<div class="card card-sm">
							<div class="card-body p-2">
								<div class="row align-items-center">
									<div class="col-auto">
										<span class="bg-yellow text-white avatar p-1">
											{{-- <img src="{{ getIcon('co_todo.svg') }}" alt=""> --}}
										</span>
									</div>
									<div class="col">
										<div class="font-weight-medium">
										</div>
										<div class="text-muted">
											To Do
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-2 col-md-3 col-sm-6 item-panel-value" style="padding-left: 0px;">
						<div class="card card-sm">
							<div class="card-body p-2">
								<div class="row align-items-center">
									<div class="col-auto">
										<span class="bg-cyan text-white avatar p-1">
											{{-- <img src="{{ getIcon('co_ticket.svg') }}" alt=""> --}}
										</span>
									</div>
									<div class="col">
										<div class="font-weight-medium">
										</div>
										<div class="text-muted">
											Ticket
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-2 col-md-3 col-sm-6 item-panel-value" style="padding-left: 0px;">
						<div class="card card-sm">
							<div class="card-body p-2">
								<div class="row align-items-center">
									<div class="col-auto">
										<span class="bg-azure text-white avatar p-1">
											{{-- <img src="{{ getIcon('co_customer.svg') }}" alt=""> --}}
										</span>
									</div>
									<div class="col">
										<div class="font-weight-medium">
										</div>
										<div class="text-muted">
											Customers
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- @elseif (checkRule(['MGR.TCH','STF.TCH'])) --}}
					@endif
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
@push('script')
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('plugins/litepicker/bundle/index.umd.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalender-scheduler/dist/index.global.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
@endpush