@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
			<a class="text-dark me-3 fs-4" href="/app"><i class="bi bi-chevron-left"></i></a>
			Sign Up
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
</div>
<div class="p-4">
	<form method="post" action="{{ route('signup') }}">
		@csrf
		<div class="mb-4">
			<label class="form-label text-muted small mb-1 req">Full Name </label>
			<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
				<span class="input-group-text bg-white"><i class="bi bi-person text-muted"></i></span>
				<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
			</div>
			@error('name')
			<small class="text-danger">{{ $errors->first('name') }}</small>
			@enderror
		</div>
		<div class="mb-4">
			<label class="form-label text-muted small mb-1 req">Mobile Number</label>
			<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
				<span class="input-group-text bg-white"><i class="bi bi-phone text-muted"></i></span>
				<input type="text" class="form-control" maxlength="10" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile Number">
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
			@error('password')
			<small class="text-danger">{{ $errors->first('password') }}</small>
			@enderror
		</div>
		<div class="mb-4">
			<label class="form-label text-muted small mb-1 req">Confirm Password</label>
			<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
				<span class="input-group-text bg-white"><i class="bi bi-lock text-muted"></i></span>
				<input type="password" class="form-control" name="password_confirmation" placeholder="***********">
			</div>
			@error('password_confirmation')
			<small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
			@enderror
		</div>
		<div class="p-3 text-center">
			<div class="h6">By signing up you agree to our</div>
			<p class="text-success mb-3">Privacy Policy and Terms.</p>
		</div>
		<div class="mb-4">
			<button type="submit" class="btn btn-submit btn-success btn-lg w-100 shadow">CREATE ACCOUNT</button>
		</div>
		<div class="p-3 text-center">
			<div class="h6">Already have an account?</div>
			<p class="text-success mb-3">Click <a href="/login">here</a> to Login</p>
		</div>
	</form>
</div>
@endsection

	