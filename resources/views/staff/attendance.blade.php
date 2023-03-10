@extends('staff.base')
@section('content')
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-white d-flex align-items-center">
			<a class="text-white me-3 fs-4" href="/staff/dash"><i class="bi bi-chevron-left"></i></a>
			Home
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
</div>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<div class="p-3">
    <div class="row">
		<div class="row">
            <h5>Attendance ({{ date('d/M/Y') }})</h5>
			<div class="col text-center p-3">
                <label class="switch">
                    <input type="checkbox" class="atChk" {{ ($stime && $stime->signin_time) ? 'checked' : '' }}>
                    <span class="slider"></span>
                    <input type="hidden" id="address" class="at_location" />
                    <input type="hidden" id="latitude" class="at_lat" />
                    <input type="hidden" id="longitude" class="at_lng" />
                </label>
			</div>						
		</div>
    </div>
</div>
<div class="card-body table-responsive">
	<table id="dataTbl" class="table table-sm table-bordered table-striped">
		<thead><tr><th>SL No</th><th>Date</th><th>In Time</th><th>In Location</th><th>Out Time</th><th>Out Location</th></tr></thead>
		<tbody> @php $slno = 1; @endphp
		@forelse($ats as $key => $at)
			<tr>
				<td>{{ $slno++ }}</td>
				<td>{{ date('d/M/Y', strtotime($at->date)) }}</td>
				<td>{{ date('h:i a', strtotime($at->signin_time)) }}</td>
				<td>{{ $at->location_in }}</td>
				<td>{{ ($at->signout_time) ? date('h:i a', strtotime($at->signout_time)) : '' }}</td>
				<td>{{ $at->location_out }}</td>		
			</tr>
		@empty
		@endforelse
		</tbody>
	</table>
</div>
<!-- <div class="fixed-bottom shadow-sm osahan-footer p-3">
	<div class="row m-0 footer-menu overflow-hiddem bg-black rounded shadow links">
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block {{ (request()->segment(1) == '') ? 'text-warning' : 'text-white' }} w-100" href="/">
				<span><i class="bi bi-house h4"></i></span>
				<p class="m-0 small">HOME</p>
			</a>
		</div>
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block {{ (request()->segment(1) == 'cart') ? 'text-warning' : 'text-white' }} w-100" href="/cart">
				<span><i class="bi bi-basket h4"></i></span>
				<p class="m-0 small">BAG</p>
			</a>
		</div>
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block {{ (request()->segment(1) == 'orders') ? 'text-warning' : 'text-white' }} w-100" href="/orders">
				<span><i class="bi bi-gift h4"></i></span>
				<p class="m-0 small">MY ORDERS</p>
			</a>
		</div>
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block {{ (request()->segment(1) == 'account') ? 'text-warning' : 'text-white' }} w-100" href="/account">
				<span><i class="bi bi-person h4"></i></span>
				<p class="m-0 small">ACCOUNT</p>
			</a>
		</div>
	</div>
</div> -->
@endsection

	