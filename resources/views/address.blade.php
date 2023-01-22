@extends('base')
@section('content')
<div class="p-4">
    <form>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Name</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-person text-muted"></i></span>
                <input type="text" class="form-control" placeholder="Enter Name">
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Mobile</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-phone text-muted"></i></span>
                <input type="password" class="form-control" placeholder="Enter Mobile">
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Address</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-geo-alt text-muted"></i></span>
                <input type="password" class="form-control" placeholder="Enter address">
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">City</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-building text-muted"></i></span>
                <input type="password" class="form-control" placeholder="Enter City">
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Pincode</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-geo text-muted"></i></span>
                <input type="password" class="form-control" placeholder="Enter Pincode">
            </div>
        </div>
    </form>
</div>
<div class="fixed-bottom shadow-sm osahan-footer p-3">
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
</div>
@endsection