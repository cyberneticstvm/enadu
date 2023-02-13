@extends('staff.base')
@section('content')
<div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
			<a class="text-dark me-3 fs-4" href="/staff/dash"><i class="bi bi-chevron-left"></i></a>
			Meetings
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
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
            <form method="post" action="{{ route('staff.meetings.save') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label text-muted small mb-1">Customer Name</label>
                    <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                        <span class="input-group-text bg-white"><i class="bi bi-person text-muted"></i></span>
                        <input type="text" class="form-control" name="customer_name" placeholder="Customer Name" required>
                    </div>
                    @error('customer_name')
                    <small class="text-danger">{{ $errors->first('customer_name') }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted small mb-1">Customer Mobile</label>
                    <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                        <span class="input-group-text bg-white"><i class="bi bi-phone text-muted"></i></span>
                        <input type="text" class="form-control" name="mobile" maxlength="10" placeholder="Enter Mobile" required>
                    </div>
                    @error('mobile')
                    <small class="text-danger">{{ $errors->first('mobile') }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted small mb-1">Customer Address</label>
                    <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                        <span class="input-group-text bg-white"><i class="bi bi-geo-alt text-muted"></i></span>
                        <textarea class="form-control" name="customer_address" placeholder="Customer Address" required></textarea>
                    </div>
                    @error('customer_address')
                    <small class="text-danger">{{ $errors->first('customer_address') }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted small mb-1">Location</label>
                    <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                        <span class="input-group-text bg-white"><i class="bi bi-geo-alt text-muted"></i></span>
                        <input type="text" class="form-control" name="location" id="address" placeholder="Enter Location" readonly>
                    </div>
                    <input type="hidden" name="latitude" id="latitude" value="" />
                    <input type="hidden" name="longitude" id="longitude" value="" />
                </div>
                <div class="input-group p-3">   
                    <button type="submit" class="col btn btn-submit btn-success">Save</button>    
                </div>
            </form>
		</div>
    </div>
</div>
<div class="p-3">
    <div class="row">
        <h5>Today's Meetings</h5>
        @forelse($meetings as $key => $meet)
            <div class="col p-3">
                Customer Name: {{ $meet->customer_name }}<br>
                Mobile: {{ $meet->mobile }}<br>
                Address: {{ $meet->customer_address }}<br>
                Distance: {{ $meet->distance }} Km
            </div>
        @empty
        @endforelse
    </div>
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

	