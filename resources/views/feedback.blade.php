@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
			<a class="text-dark me-3 fs-4" href="/geebinapp"><i class="bi bi-chevron-left"></i></a>
			My Feedbacks
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
</div>
<div class="p-4">
	<h5>Feedback History</h5>
	<div class="osahan-notification">
		<div class="row mb-3">
			@forelse($feedbacks as $key => $feedback)
			@php
				$replies = App\Models\Feedback::where('comment_id', $feedback->id)->get();
			@endphp
			<div class="notification d-flex m-0 bg-white shadow-sm mb-1 p-3">
				<div class="icon pe-3">
					<span class="icofont-check-circled text-success mb-0 rounded-pill mt-1 fs-1 d-inline-block"></span>
				</div>
				<div class="noti-details l-hght-18 pr-0">
					<p class="mb-1 fw-bold">{{ $feedback->comment }}</p>
					<span class="small text-muted">{{ $feedback->feedback_category }}</span>
				</div>
				<div class="small px-0 ms-auto">
					<span>{{ date('d/M/Y h:i a', strtotime($feedback->created_at)) }}</span>
				</div>
			</div>
				@forelse($replies as $repl => $re)
				<div class="notification d-flex m-0 bg-white shadow-sm mb-1 p-3">					
					<div class="noti-details l-hght-18 pr-0">
						<p class="mb-1 fw-bold">{{ $re->comment }}</p>
						<span class="small text-muted">{{ $re->feedback_category }}</span>
					</div>
					<div class="small px-0 ms-auto">
						<span>{{ date('d/M/Y h:i a', strtotime($re->created_at)) }}</span>
					</div>
					<div class="icon pe-3">
						<span class="icofont-check-circled text-success mb-0 rounded-pill mt-1 fs-1 d-inline-block"></span>
					</div>
				</div>
				@empty
				@endforelse
			@empty
			<div class="col">No History Found!</div>
			@endforelse
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
    <form method="post" action="{{ route('feedback.save') }}">
        @csrf
        <div class="mb-4">
			<label class="form-label text-muted small mb-1 req">Feedback Category</label>
			<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
				<select class="form-control" name="feedback_category">
					<option value="">Select</option>
					<option value="suggestion">Suggestion</option>
					<option value="grievance">Grievance</option>
				</select>
			</div>
			@error('feedback_category')
			<small class="text-danger">{{ $errors->first('feedback_category') }}</small>
			@enderror
		</div>
        <div class="mb-4">
			<label class="form-label text-muted small mb-1 req">Comment </label>
			<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
				<textarea class="form-control" rows="5" name="comment" placeholder="Comment">{{ old('comment') }}</textarea>
			</div>
			@error('comment')
			<small class="text-danger">{{ $errors->first('comment') }}</small>
			@enderror
		</div>
		<div class="input-group">   
			<button type="submit" class="col btn btn-submit btn-success">SUBMIT</button>    
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

	