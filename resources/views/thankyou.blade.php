@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
			<a class="text-dark me-3 fs-4" href="/geebinapp"><i class="bi bi-chevron-left"></i></a>
			Payment Status
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
</div>
<div class="p-4">
    @if($order->payment_status == 'Credit' || ($order->payment_status == 'Pending' && $order->payment_type == 'cod'))
        <div class="alert alert-success">
            Thank You! Your order has been placed successfully with Order ID: {{ $order->id }}
        </div>
    @endif
</div>
<div class="p-4">
    Click <a href="/orders">HERE</a> to view your orders.
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

	