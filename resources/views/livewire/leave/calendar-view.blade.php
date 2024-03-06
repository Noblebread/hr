@section('upper_script')
	<script src="{{ asset('fullcalendar/index.global.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fullcalendar.min.css') }}">
	<style>
		#calendar {
			max-width: 1100px;
			margin: 0 auto;
		}
	</style>
@endsection
<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item"><a href="/Leave">Leave List</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Calendar</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<div class="col-sm-12">
			<div id="calendar-container">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</div>
@section('custom_script')
	@include('layouts.scripts.calendar-scripts')
@endsection
