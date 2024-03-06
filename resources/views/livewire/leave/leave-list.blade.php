@section('upper_script')
	<style>
		#custom_button:hover {
			color: white;
		}
	</style>
@endsection
@php
	use Carbon\Carbon;
@endphp
<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Leave List</li>
				</ul>
			</div>
		</div>
	</div>
	<livewire:flash-message.flash-message />
	<div class="row d-flex justify-content-center">
		<div class="col-sm-12">
			<div class="card card-table show-entire">
				<div class="card-body">

					<div class="page-table-header mb-2">
						<div class="row align-items-center">
							<div class="col">
								<div class="doctor-table-blk">
									<h3>Leave List</h3>
									<div class="doctor-search-blk">
										<div class="add-group">
											<a class="btn btn-primary ms-2" wire:click="createLeave"><img alt
													src="{{ asset('assets/img/icons/plus.svg') }}"></a>
											<a class="btn btn-primary ms-2 " href="/calendar" id="custom_button">
												<i class="fa-solid fa-calendar-days"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto text-end float-end ms-auto download-grp">
								<div class="top-nav-search table-search-blk">
									<form>
										<input class="form-control" name="search" placeholder="Search here" type="text"
											wire:model.debounce.500ms="search">
										<a class="btn"><img alt src="{{ asset('assets/img/icons/search-normal.svg') }}"></a>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table border-0 custom-table comman-table datatable mb-0">
							<thead>
								<tr>
									<th style="width: 25%">Name</th>
									<th style="width: 20%">Date and Time</th>
									
									<th style="width: 15%">Status</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								{{-- @foreach ($leaves as $leave)
									<input hidden id="room" type="text" value="{{ $leave->roomUrl }}">
									<tr>
										<td>{{ $leave->patients->name ?? '' }}</td>
										<td>
											{{ Carbon::parse($leave->date)->format('M d, Y') }} at
											{{ Carbon::parse($leave->time)->format('h:i A') }}
										</td>
										
										<td>{{ $leave->statuses->name }}</td>
										<td class="text-center">
											
										</td>
									</tr>
								@endforeach --}}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- Modal --}}
<div aria-hidden="true" aria-labelledby="leaveModal" class="modal fade" data-bs-backdrop="static"
	data-bs-keyboard="false" id="leaveModal" role="dialog" tabindex="-1" wire.ignore.self>
	<div class="modal-dialog modal-dialog-centered">
		<livewire:leave.leave-form />
	</div>
</div>
<div aria-hidden="true" aria-labelledby="documentModal" class="modal fade" data-bs-backdrop="static"
	data-bs-keyboard="false" id="documentModal" role="dialog" tabindex="-1" wire.ignore.self>
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<livewire:leave.document-form />
	</div>
</div>

@section('custom_script')
	@include('layouts.scripts.leave-scripts')
@endsection
