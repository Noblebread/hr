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
									<div class="doctor-search-blk">
										<div class="add-group">
											<a wire:click="createStaff" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
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
									<th style="width: 10%">ID</th>
									<th style="width: 15%">Name</th>
									<th style="width: 15%">Contacts</th>
									<th style="width: 10%">Gender</th>
									<th style="width: 10%">Birthdate</th>
									<th style="width: 5%">age</th>
									<th style="width: 15%">Department</th>
									{{-- <th style="width: 10%">Status</th> --}}
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($staffs as $staff)
									<tr>
										<td>
											{{ $staff->id_no }} 
										</td>
										<td>
											{{ $staff->first_name }} {{ $staff->middle_name ?? '' }} {{ $staff->last_name }}
										</td>
										
										<td>
											{{ $staff->contact_number }}	
										</td>
										<td>
											{{ $staff->gender_id }}
										</td>
										<td>
											{{ $staff->birthdate }}
										</td>
										<td>
											{{ $staff->age}}
										</td>
										<td>
											{{ $staff->department }}
										</td>
										{{-- <td>
											{{ $staff->status }}
										</td> --}}
										<td class="text-center">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="editStaff({{ $staff->id }})" title="Edit">
													<i class='fa fa-pen-to-square'></i>
												</button>
												<a class="btn btn-danger btn-sm mx-1" wire:click="deleteStaff({{ $staff->id }})" title="Delete">
													<i class="fa fa-trash"></i>
												</a>
											</div>
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
<div aria-hidden="true" aria-labelledby="staffModal" class="modal fade" data-bs-backdrop="static"
	data-bs-keyboard="false" id="staffModal" role="dialog" tabindex="-1" wire.ignore.self>
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<livewire:staff.staff-form />
	</div>
</div> 
@section('custom_script')
	@include('layouts.scripts.staff-scripts')
@endsection
