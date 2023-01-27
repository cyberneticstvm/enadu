@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
			<a class="text-dark me-3 fs-4" href="/app"><i class="bi bi-chevron-left"></i></a>
			Login
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
</div>
<div class="p-4">
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
	<form method="post" action="{{ route('loginn') }}">
		@csrf
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
            <input type="checkbox" name="remember" value="1">
            <label for="remember" class="form-label text-muted small mb-1">Remember me</label>            
        </div>
		<div class="mb-4">
			<button type="submit" class="btn btn-submit btn-success btn-lg w-100 shadow">LOGIN</button>
		</div>
        <div class="p-3 text-center">
			<div class="h6">Don't have an account yet?</div>
			<p class="text-success mb-3">Click <a href="/signup">here</a> to Signup</p>
		</div>
	</form>
</div>
@endsection

	