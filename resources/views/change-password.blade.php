@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-white d-flex align-items-center">
			<a class="text-white me-3 fs-4" href="/account"><i class="bi bi-chevron-left"></i></a>
			Forgot Password
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
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
	@php $user = Session::get('user') @endphp
	<form method="post" action="{{ route('changepwd') }}">
		@csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
		<div class="mb-4">
			<label class="form-label text-muted small mb-1 req">New Password</label>
			<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
				<span class="input-group-text bg-white"><i class="bi bi-phone text-muted"></i></span>
				<input type="password" class="form-control" name="password" placeholder="******">
			</div>
			@error('password')
			<small class="text-danger">{{ $errors->first('password') }}</small>
			@enderror
		</div>
        <div class="mb-4">
			<label class="form-label text-muted small mb-1 req">Confirm New Password</label>
			<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
				<span class="input-group-text bg-white"><i class="bi bi-phone text-muted"></i></span>
				<input type="password" class="form-control" name="password_confirmation" placeholder="******">
			</div>
			@error('password')
			<small class="text-danger">{{ $errors->first('password') }}</small>
			@enderror
		</div>
		<div class="mb-4">
			<button type="submit" class="btn btn-submit btn-success btn-lg w-100 shadow">SUBMIT</button>
		</div>
	</form>
</div>
@endsection

	