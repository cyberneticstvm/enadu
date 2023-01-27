@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
			<a class="text-dark me-3 fs-4" href="/app"><i class="bi bi-chevron-left"></i></a>
			Milestone (Order ID: {{ $order->id }})
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
</div>
<div class="p-3">
    <div class="bg-white shadow-sm my-3 p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="mb-1 text-success">Order ID: {{ $order->id }}</h6>
            <div class="text-success"><i class="bi bi-dot"></i>&nbsp;{{ $ostatus }}&nbsp; <i class="bi bi-clock-history"></i></div>
        </div>
        <div class="text-muted small">{{ date('d/M/Y h:i a') }}</div>
        <hr>
        <div class="row m-0">
            <div class="col-1 d-flex justify-content-center ps-0">
                <div class="d-block">
                    <div class="lh-1 mt-1"><i class="bi bi-circle-fill text-success"></i></div>
                    <div class="lh-1"><i class="bi bi-dot text-success"></i></div>
                    <div class="lh-1"><i class="bi bi-dot text-success"></i></div>
                    <div class="lh-1"><i class="bi bi-dot text-success"></i></div>
                    <div class="lh-1 mt-1"><i class="bi bi-circle-fill text-success"></i></div>
                    @forelse($milestones as $key => $mile)
                    <div class="lh-1"><i class="bi bi-dot {{ ($mile->order_status == 5) ? 'text-success' : 'text-danger' }}"></i></div>
                    <div class="lh-1"><i class="bi bi-dot {{ ($mile->order_status == 5) ? 'text-success' : 'text-danger' }}"></i></div>
                    <div class="lh-1"><i class="bi bi-dot {{ ($mile->order_status == 5) ? 'text-success' : 'text-danger' }}"></i></div>                    
                    <div class="lh-1 mt-1"><i class="bi bi-circle-fill {{ ($mile->order_status == 5) ? 'text-success' : 'text-danger' }}"></i></div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="col-11 ps-0">
                <div class="mb-3">
                    <div class="h6 mb-1 text-success">Order Placed</div>
                    <div class="text-muted small">{{ date('d/M/Y h:i a', strtotime($order->created_at)) }}</div>
                </div>
                <div class="mb-3">
                    <div class="h6 mb-1 text-success">Estimated Dispatch</div>
                    <div class="text-muted small">{{ date('d/M/Y h:i a', strtotime($ostaff->created_at)) }}</div>
                </div>
            <div>
            <div class="col-11 ps-0">
                @forelse($milestones as $key => $mile)
                <div class="mb-3">
                    <div class="h6 mb-1 {{ ($mile->order_status == 5) ? 'text-success' : 'text-danger' }}">{{ $mile->name }} - {{ $mile->comments }}</div>
                    <div class="text-muted small">On Sat, 29th Feb'22</div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
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

	