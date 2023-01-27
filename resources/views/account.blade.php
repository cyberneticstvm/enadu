@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-white d-flex align-items-center">
			<a class="text-white me-3 fs-4" href="/geebinapp"><i class="bi bi-chevron-left"></i></a>
			My Account
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
</div>
<div class="p-3">
	<div class="row">
		<div class="col text-center p-3">
			<a href="/home"><img src="{{ public_path().'/img/prod.png' }}" class="img-fluid" /></a><br>
			<span class="text-success fw-bold">PRODUCTS</span>
		</div>
		<div class="col text-center p-3">
			<a href="/orders"><img src="{{ public_path().'/img/truck.png' }}" class="img-fluid" /></a><br>
			<span class="text-success fw-bold">ORDERS</span>
		</div>
	</div>
	<div class="row">
		<div class="col text-center p-3">
			<a href="/feedback"><img src="{{ public_path().'/img/feedback.png' }}" class="img-fluid" /></a><br>
			<span class="text-success fw-bold">FEEDBACK</span>
		</div>
		<div class="col text-center p-3">
			<a href="/profile"><img src="{{ public_path().'/img/user.png' }}" class="img-fluid" /></a><br>
			<span class="text-success fw-bold">ACCOUNT</span>
		</div>
	</div>
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

	