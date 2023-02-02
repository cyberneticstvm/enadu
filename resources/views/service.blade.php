@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-white d-flex align-items-center">
			<a class="text-white me-3 fs-4" href="/account"><i class="bi bi-chevron-left"></i></a>
			Service Request
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
    <form method="post" action="{{ route('service.save') }}">
        @csrf
        <input type="hidden" name="type" value="service" />
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Select Product</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-gift text-muted"></i></span>
                <select class="form-control" name="product">
                    <option value="">Select</option>
                    @forelse($products as $key => $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            @error('product')
			<small class="text-danger">{{ $errors->first('product') }}</small>
			@enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Purchase Type</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-gear text-muted"></i></span>
                <select class="form-control ptype" name="ptype">
                    <option value="">Select</option>
                    <option value="direct">Direct Purchase</option>
                    <option value="localbody">Local Body</option>
                </select>
            </div>
            @error('ptype')
			<small class="text-danger">{{ $errors->first('ptype') }}</small>
			@enderror
        </div>
        <div class="mb-4 d-none direct">
            <label class="form-label text-muted small mb-1">Franchise Name if Direct Purchase</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-geo-alt text-muted"></i></span>
                <input type="text" class="form-control" name="ptype_address" placeholder="Franchise Name">
            </div>
        </div>
        <div class="localbody d-none">
            <div class="mb-4">
                <label class="form-label text-muted small mb-1">District</label>
                <select class="form-control district" name="district">
                    <option value="">Select</option>
                    @forelse($districts as $key => $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label text-muted small mb-1">Localbody</label>
                <select class="form-control localbodysel" name="localbody">
                    <option value="">Select</option>
                </select>
                <input type="hidden" id="localbody_type" name="localbody_type" value="dir" />
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Service Address</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-geo-alt text-muted"></i></span>
                <select class="form-control" name="address">
                    <option value="">Select</option>
                    @forelse($addresses as $key => $addr)
                    <option value="{{ $addr->id }}">{{ $addr->address }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            @error('address')
			<small class="text-danger">{{ $errors->first('address') }}</small>
			@enderror
        </div>
        <div class="text-end mt-3">
            <a href="/" data-bs-toggle="modal" data-bs-target="#addressModal" class="col btn btn-info addrServ">Add New Address</a>
        </div>
        <div class="input-group p-3">   
            <button type="submit" class="col btn btn-submit btn-success">Submit</button>    
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
				<p class="m-0 small">MY CART</p>
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

	