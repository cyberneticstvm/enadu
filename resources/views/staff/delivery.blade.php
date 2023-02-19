@extends('staff.base')
@section('content')
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-white d-flex align-items-center">
			<a class="text-white me-3 fs-4" href="/app"><i class="bi bi-chevron-left"></i></a>
			Status Update
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
    <form method="post" action="{{ route('staff.delivery.update') }}">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}" />
        <div class="row mb-3">
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="req">Comments</label>
                    <input type="text" name="comments" class="form-control" />
                </div>
                @error('comments')
                <small class="text-danger">{{ $errors->first('comments') }}</small>
                @enderror
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label class="req">Order Status</label>
                    <select class="form-control" name="order_status">
                        <option value="">Select</option>
                        @forelse($status as $key => $stat)
                        <option value="{{ $stat->id }}" {{ ($order && $order->order_status == $stat->id) ? 'selected': '' }}>{{ $stat->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                @error('order_status')
                <small class="text-danger">{{ $errors->first('order_status') }}</small>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-submit btn-primary">Update</button>
            </div>
        </div>
    </form>
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

	