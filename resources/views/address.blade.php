@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
			<a class="text-dark me-3 fs-4" href="/geebinapp"><i class="bi bi-chevron-left"></i></a>
			My Addresses
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
<div class="row p-4">
    <h5>My Addresses </h5>
    @forelse($addresses as $key => $addr)
        <div class="col-md-3">
            {{ $addr->contact_name }}<br>
            {{ $addr->mobile }}<br>
            {{ $addr->address }}<br>
            {{ $addr->pincode }}<br>
            {{ $addr->landmark }}<br>
            <form method="post" action="{{ route('address.delete', $addr->id) }}">
                @csrf 
                @method("DELETE")
                <button type="submit" class="btn btn-link" onclick="javascript: return confirm('Are you sure want to delete this Record?');">Remove</button>
            </form>
        </div>
    @empty
    @endforelse
</div>
<div class="p-4">
    <form method="post" action="{{ route('address.save') }}">
        @csrf
        <input type="hidden" name="type" value="addr" />
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Name</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-person text-muted"></i></span>
                <input type="text" class="form-control" name="contact_name" placeholder="Enter Name" required>
            </div>
            @error('contact_name')
			<small class="text-danger">{{ $errors->first('contact_name') }}</small>
			@enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Mobile</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-phone text-muted"></i></span>
                <input type="text" class="form-control" name="mobile" maxlength="10" placeholder="Enter Mobile" required>
            </div>
            @error('mobile')
			<small class="text-danger">{{ $errors->first('mobile') }}</small>
			@enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Address</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-geo-alt text-muted"></i></span>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" required>
            </div>
            <input type="hidden" name="latitude" id="latitude" value="" />
            <input type="hidden" name="longitude" id="longitude" value="" />
            @error('address')
			<small class="text-danger">{{ $errors->first('address') }}</small>
			@enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">District</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-bank text-muted"></i></span>
                <select class="form-control" name="district" required>
                    <option value="">Select</option>
                    @forelse($districts as $key => $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            @error('district')
			<small class="text-danger">{{ $errors->first('district') }}</small>
			@enderror
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small mb-1">Landmark</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-geo text-muted"></i></span>
                <input type="text" class="form-control" name="landmark" placeholder="Landmark" required>
            </div>
            @error('landmark')
			<small class="text-danger">{{ $errors->first('landmark') }}</small>
			@enderror
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small mb-1">Pincode</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-geo text-muted"></i></span>
                <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" required>
            </div>
            @error('pincode')
			<small class="text-danger">{{ $errors->first('pincode') }}</small>
			@enderror
        </div>
        <div class="input-group p-3">   
            <button type="submit" class="col btn btn-submit btn-success">Save</a>    
        </div>
    </form>
</div>
<div class="fixed-bottom shadow-sm osahan-footer p-3">
	<div class="row m-0 footer-menu overflow-hiddem bg-black rounded shadow links">
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block {{ (request()->segment(1) == 'account') ? 'text-warning' : 'text-white' }} w-100" href="/account">
				<span><i class="bi bi-house h4"></i></span>
				<p class="m-0 small">HOME</p>
			</a>
		</div>
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block {{ (request()->segment(1) == 'cart') ? 'text-warning' : 'text-white' }} w-100" href="/cart">
				<span><i class="bi bi-basket h4"></i></span>
				<p class="m-0 small">CART</p>
			</a>
		</div>
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block {{ (request()->segment(1) == 'orders') ? 'text-warning' : 'text-white' }} w-100" href="/orders">
				<span><i class="bi bi-gift h4"></i></span>
				<p class="m-0 small">MY ORDERS</p>
			</a>
		</div>
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block {{ (request()->segment(1) == 'profile') ? 'text-warning' : 'text-white' }} w-100" href="/profile">
				<span><i class="bi bi-person h4"></i></span>
				<p class="m-0 small">ACCOUNT</p>
			</a>
		</div>
	</div>
</div>
@endsection