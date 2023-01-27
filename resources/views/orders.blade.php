@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-white d-flex align-items-center">
			<a class="text-white me-3 fs-4" href="/geebinapp"><i class="bi bi-chevron-left"></i></a>
			My Orders
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
</div>
@forelse($orders as $key => $order)
<div class="bg-white shadow-sm my-3 p-3 d-flex gap-3 position-relative">
	<img src="{{ public_path().'/img/cart-icon.png' }}" class="img-fluid w-55 mb-auto border rounded">
	<div>
		<h6 class="fw-bold mb-1">₹{{ $order->amount }}</h6>
		<p class="mb-0">Order #{{ $order->id }}</p>
		<p class="small text-muted m-0">{{ $order->order_details()->count() }} item(s)</p>
	</div>
	<div class="ms-auto text-end">
		<div class="text-success mb-2"><i class="bi bi-clock-history me-1"></i> {{ $order->payment_status }}</div>
		<div class="text-muted small">{{ date('d/M/Y h:i a', strtotime($order->created_at)) }}</div>
	</div>
	<a class="stretched-link" href="/milestone/{{ $order->id }}"></a>
</div>
@empty
@endforelse
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

	