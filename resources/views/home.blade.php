@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-white d-flex align-items-center">
			<a class="text-white me-3 fs-4" href="/account"><i class="bi bi-chevron-left"></i></a>
			Home
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
<div class="border-bottom border-top px-3 d-flex align-items-center justify-content-between">
	<ul class="nav home-tabs" id="pills-tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Best Selling Products</button>
		</li>
	</ul>
</div>
<div class="tab-content" id="pills-tabContent">
	<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
		<div class="osahan-listing">
			<div class="osahan-listing p-0 m-0 row">
				@forelse($products as $key => $product)
				<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
					<div class="list_item_gird m-0 bg-white listing-item">
						<span class="badge bg-success m-3 position-absolute">25% OFF</span>
						<div class="list-item-img p-4" id="prod_{{$product->id}}">
							<img src="{{ public_path().'/storage/products/'.$product->image }}" class="img-fluid p-3">
						</div>
						<div class="tic-div px-3 pb-3">
							<p class="mb-1 text-black">{{ $product->name }}</p>
							<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹{{ $product->price }} <small class="text-decoration-line-through text-muted small fw-light">₹{{ number_format($product->price + (($product->price*25)/100), 2) }}</small></h6>
							<!--<a href="#" data-toggle="tooltip" data-placement="top" class="mb-1 text-black" title="{{ $product->description }}">Description</a>-->
							<div class="text-center mb-3"><a class="btn btn-outline-success btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#prod{{$product->id}}">Quick View</a></div>
							<form method="post" action="{{ route('cart.add') }}">
								@csrf
								<input type="hidden" name="product_id" value="{{ $product->id }}" />
								<input type="hidden" name="product_name" value="{{ $product->name }}" />
								<input type="hidden" name="product_price" value="{{ $product->price }}" />
								<input type="hidden" name="product_image" value="{{ $product->image }}" />
								<div class="d-flex align-items-center justify-content-between gap-1">
									<div class="quantity-btn">
										<div class="input-group input-group-sm border rounded overflow-hiddem">
											<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
											<input type="text" class="form-control text-center box border-0" value="1" name="qty" placeholder="" aria-label="Example text with button addon">
											<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
										</div>
									</div>
									<div class="">												
										<div class="input-group">
											<button type="submit" class="col btn-submit btn btn-success">Add to Cart</button>
										</div>
									</div>																			
								</div>
							</form>
						</div>
					</div>
				</div>
				@empty
				@endforelse
			</div>
		</div>
	</div>
</div>
<div class="input-group p-3">   
	<a href="/cart" class="col btn btn-submit btn-success">Proceed to Checkout</a>    
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
				<p class="m-0 small">MY CART</p>
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
@forelse($products as $key => $product)
<div class="modal fade" id="prod{{$product->id}}" tabindex="-1" aria-labelledby="pdctModalLabel{{$product->id}}" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered m-0">
		<div class="modal-content modal-content rounded-0 border-0">
			<div class="modal-header">
				<h6 class="modal-title fw-bold" id="addressModalLabel">Product Details</h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="text-dark col-12 px-0 position-relative">
					<div class="list_item_gird m-0 bg-white listing-item">
						<span class="badge bg-success m-3 position-absolute">25% OFF</span>
						<div class="list-item-img text-center">
							<img src="{{ public_path().'/storage/products/'.$product->image }}" class="img-fluid p-3">
						</div>
						<div class="tic-div px-3 pb-3">
							<p class="mb-1 text-black">{{ $product->name }}</p>
							<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹{{ $product->price }} <small class="text-decoration-line-through text-muted small fw-light">₹{{ number_format($product->price + (($product->price*25)/100), 2) }}</small></h6>
							<p class="mb-1 text-black">{{ $product->description }}</p>
						</div>
					</div>
					<form method="post" action="{{ route('cart.add') }}">
						@csrf
						<input type="hidden" name="product_id" value="{{ $product->id }}" />
						<input type="hidden" name="product_name" value="{{ $product->name }}" />
						<input type="hidden" name="product_price" value="{{ $product->price }}" />
						<input type="hidden" name="product_image" value="{{ $product->image }}" />
						<div class="d-flex align-items-center justify-content-between gap-1">
							<div class="quantity-btn">
								<div class="input-group input-group-sm border rounded overflow-hiddem">
									<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
									<input type="text" class="form-control text-center box border-0" value="1" name="qty" placeholder="" aria-label="Example text with button addon">
									<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
								</div>
							</div>
							<div class="">												
								<div class="input-group">
									<button type="submit" class="col btn-submit btn btn-success">Add to Cart</button>
								</div>
							</div>																			
						</div>
					</form>
					@if($product && $product->youtube_video_id)
					<div class="row mt-5">
						<div class="col">
							<p>How to set GEEBIN</p>
							<iframe width="100%" height="315" style="border: 5px solid green"
								src="https://www.youtube.com/embed/{{$product->youtube_video_id}}">
							</iframe>
						</div>
					</div>
					@endif
				</div>				
			</div>
		</div>
	</div>
</div>
@empty
@endforelse
@endsection

	


