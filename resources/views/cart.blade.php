@extends('base')
@section('content')
<div class="bg-white shadow-sm my-3 p-3">
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
    <div class="card od-card border-0">
        @if(session('cart'))
            @php $total = 0;@endphp
            @foreach(session('cart') as $id => $product)
            @php            
            $total += $product['price'] * $product['qty'];
            @endphp
            <div class="d-flex bag-item">
                <div class="bag-item-left">
                    <div class="slider-for border rounded-3 mx-1 mb-1">
                        <div class="product1"><img src="{{ public_path().'/storage/products/'.$product['image'] }}" class="img-fluid rounded-3" alt=""></div>
                    </div>
                </div>
                <div class="bag-item-right w-100">
                    <div class="card-body pe-0 py-0">
                        <span class="badge bg-success">25% OFF</span>
                        <p class="card-text mb-0 mt-1 text-black">{{ $product['name'] }}</p>
                        <small class="text-muted"><i class="bi bi-shop me-1"></i> Seller - Enadu</small>
                        <h4 class="card-title mt-2 text-black fw-bold">₹{{ $product['price'] }} <small
                                class="text-decoration-line-through text-muted fs-6 fw-light">₹{{ number_format($product['price'] + (($product['price']*25)/100), 2) }}</small></h4>
                        <div class="d-flex align-items-center justify-content-between gap-3">
                            <div class="size-btn">
                                <div class="text-muted small mb-1">Remove</div>
                                <div>
                                    <i class="bi bi-trash text-danger dltCartItem" data-pdct="{{ $id }}"></i>
                                </div>
                            </div>
                            <div class="quantity-btn">
                                <div class="text-muted small mb-1">Quantity</div>
                                <div class="input-group input-group-sm border rounded overflow-hiddem">
                                    <div class="btn btn-light text-success minus border-0 bg-white"><i
                                            class="bi bi-dash"></i></div>
                                    <input type="text" class="form-control text-center box border-0 cartQty" value="{{ $product['qty'] }}"
                                        placeholder="" aria-label="Example text with button addon" data-pdct="{{ $id }}">
                                    <div class="btn btn-light text-success plus border-0 bg-white"><i
                                            class="bi bi-plus"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@if(session('cart'))
<div class="bg-white shadow-sm mb-4 p-3">
    <h6 class="mb-3 text-black fw-bold">Price Summary</h6>
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div class="text-muted">Product Total</div>
        <div class="price">₹{{ number_format($total, 2) }}</div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="text-muted">Shipping charges</div>
        <div class="text-success free">FREE</div>
    </div>
    <hr class="my-3">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h6 class="mb-0 text-dark">Order Total</h6>
            <small class="text-muted">inclusive of all taxes</small>
        </div>
        <div class="text-success h5">₹{{ number_format($total, 2) }}</div>
    </div>
</div>
@if(Auth::user() && Auth::user()->user_type == 'user')
<form method="post" action="{{ route('checkout') }}">
    <input type="hidden" name='purpose' value='Enadu Order' />
    <input type="hidden" name='amount' value="{{ $total }}" />
    <input type="hidden" name='phone' value="{{ Auth::user()->mobile }}" />
    <input type="hidden" name='buyer_name' value="{{ Auth::user()->name }}" />
    @csrf
    <div class="p-3">
        <h6 class="mb-3 text-black fw-bold">Select Delivery Address</h6>
        @forelse($addresses as $key => $addr)
        <div class="btn-group osahan-btn-group w-100 d-flex flex-column" role="group"
            aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="address" autocomplete="off" id="{{ $addr->id }}" value="{{ $addr->id }}" checked>
            <label class="btn btn-outline-light d-flex align-items-center gap-3 rounded px-3 py-2" for="{{ $addr->id }}">
                <i class="bi bi-house"></i>
                <span class="text-start">
                    <h6 class="mb-0 fw-bold">{{ $addr->contact_name }}</h6>
                    <div class="text-muted small text-opacity-50">{{ $addr->address }}</div>
                    <div class="text-muted small text-opacity-50">Landmark: {{ $addr->landmark }}</div>
                    <div class="text-muted small text-opacity-50">Pincode: {{ $addr->pincode }}</div>
                    <div class="text-muted small text-opacity-50">Contact: {{ $addr->mobile }}</div>
                </span>
                <i class="bi bi-check-circle-fill ms-auto"></i>
            </label>
        </div>
        @empty
        @endforelse
        @error('address')
        <small class="text-danger">{{ $errors->first('address') }}</small>
        @enderror
        <div class="text-end mt-3">
            <a href="/" data-bs-toggle="modal" data-bs-target="#addressModal" class="col btn btn-info">Add Address</a>
        </div>
    </div>
    <div class="input-group p-3">   
        <button type="submit" class="col btn btn-submit btn-success">CHECKOUT</button>    
    </div>
</form>
@else
<div class="input-group p-3">
    <a href="/login" class="col btn btn-primary">Login to Continue</a>
</div>
@endif
<div class="input-group p-3">
    <a href="/" class="col btn btn-warning">Continue Shopping</a>
</div>
@else
<div class="bg-white shadow-sm mb-4 p-3">Your Bag is empty. Click <a href="/">HERE</a> to continue your shopping.</div>
@endif


<div class="fixed-bottom shadow-sm osahan-footer p-3">
	<div class="row m-0 footer-menu overflow-hiddem bg-black rounded shadow links">
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block text-warning w-100" href="/">
				<span><i class="bi bi-house h4"></i></span>
				<p class="m-0 small">HOME</p>
			</a>
		</div>
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block text-white w-100" href="/cart">
				<span><i class="bi bi-basket h4"></i></span>
				<p class="m-0 small">BAG</p>
			</a>
		</div>
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block text-white w-100" href="/">
				<span><i class="bi bi-gift h4"></i></span>
				<p class="m-0 small">OFFERS</p>
			</a>
		</div>
		<div class="col-3 p-0 text-center">
			<a class="p-2 d-inline-block text-white w-100" href="/account">
				<span><i class="bi bi-person h4"></i></span>
				<p class="m-0 small">ACCOUNT</p>
			</a>
		</div>
	</div>
</div>
@endsection