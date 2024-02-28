<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Staff List</li>
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
									<h3>Staff List</h3>
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
					{{-- <div>
						<select class="form-select mb-3" placeholder="Select Branch" wire:model="branchFilter">
							<option value="">All Branch</option>
							@foreach ($branches as $branch)
								<option value="{{ $branch->id }}">{{ $branch->name }}</option>
							@endforeach
						</select>

						<!-- Rest of your table and staff list rendering code -->

					</div> --}}

					<div class="table-responsive">
						<table class="table border-0 custom-table comman-table datatable mb-0">
							<thead>
								<tr>
									<th style="width: 60%">Name</th>
									
									<th style="width: 40%">Role</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($staffs as $staff)
									<tr>
										<td>
											{{ $staff->first_name }} {{ $staff->middle_name ?? '' }} {{ $staff->last_name }}
										</td>
										
										<td>
											@foreach ($staff->roles as $r)
                                                <span class="badge bg-success text-capitalize">{{ $r->name }}</span>
                                            @endforeach
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- <div aria-hidden="true" aria-labelledby="staffModal" class="modal fade" data-bs-backdrop="static"
	data-bs-keyboard="false" id="staffModal" role="dialog" tabindex="-1" wire.ignore.self>
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<livewire:staff.staff-form />
	</div>
</div> --}}
@section('custom_script')
	@include('layouts.scripts.staff-scripts')
@endsection
