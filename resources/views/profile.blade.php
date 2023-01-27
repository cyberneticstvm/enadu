@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-white d-flex align-items-center">
			<a class="text-white me-3 fs-4" href="/account"><i class="bi bi-chevron-left"></i></a>
			My Account
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
	<h5>My Profile</h5>
	<form method="post" action="{{ route('profile.update', $profile->id) }}">
		@csrf
		@method("PUT")
		<div class="mb-4">
			<label class="form-label text-muted small mb-1 req">Full Name </label>
			<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
				<span class="input-group-text bg-white"><i class="bi bi-person text-muted"></i></span>
				<input type="text" class="form-control" name="name" value="{{ $profile->name }}" placeholder="Full Name">
			</div>
			@error('name')
			<small class="text-danger">{{ $errors->first('name') }}</small>
			@enderror
		</div>
		<div class="mb-4">
			<label class="form-label text-muted small mb-1 req">Mobile Number</label>
			<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
				<span class="input-group-text bg-white"><i class="bi bi-phone text-muted"></i></span>
				<input type="text" class="form-control" maxlength="10" name="mobile" value="{{ $profile->mobile }}" placeholder="Mobile Number">
			</div>
			@error('mobile')
			<small class="text-danger">{{ $errors->first('mobile') }}</small>
			@enderror
		</div>
		<div class="mb-4">
			<label class="form-label text-muted small mb-1 req">Password</label>
			<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
				<span class="input-group-text bg-white"><i class="bi bi-lock text-muted"></i></span>
				<input type="password" class="form-control" name="password" placeholder="***********">
			</div>
		</div>
		<div class="mb-4">
			<button type="submit" class="btn btn-submit btn-success btn-lg w-100 shadow">UPDATE</button>
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

	