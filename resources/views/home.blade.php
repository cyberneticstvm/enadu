@extends('base')
@section('content')
<div class="alert alert-warning alert-dismissible fade show d-flex align-items-center px-3 py-2 app-box m-0 border-0" role="alert">
	<div class="d-flex align-items-center gap-3">
		<img src="{{ public_path().'/img/brand.png' }}" class="img-fluid" />
		<span>
			<p class="m-0 fw-bold text-dark">Use app for best experience!</p>
			<small class="text-dark-50">Available for Android & iOS</small>
		</span>
	</div>
	<span class="ms-auto me-3">
		<a class="btn btn-sm btn-success me-3" href="#">USE APP</a>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</span>
</div>
<div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header sticky-top">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h4 class="m-0 fw-bold text-black">kary<span class="text-success">ana</span></h4>
		<div class="ms-auto d-flex align-items-center">
			<a href="#" class="me-3 text-dark fs-5"><i class="bi bi-person-circle"></i></a>
			<a href="#" class="me-3 text-dark fs-5"><i class="bi bi-basket"></i></a>
			<a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
	<div class="input-group input-group-lg bg-white border-0 shadow-sm rounded overflow-hiddem mt-3">
		<span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
		<input type="text" class="form-control border-0 ps-0" placeholder="Search for Products..">
	</div>
</div>
<div class="py-3">
	<div class="px-3 d-flex justify-content-between">
		<h6 class="mb-2 text-black fw-bold ">Today Offer's</h6>
		<a class="text-success text-decoration-none" href="#">SEE ALL <i class="bi bi-arrow-right-circle-fill"></i></a>
	</div>
	<div class="home-cate">
		<div class="home-productc">
			<a href="#"><img src="{{ public_path().'/img/1.png' }}" class="img-fluid" /></a>
		</div>
		<div class="home-productc">
			<a href="#"><img src="{{ public_path().'/img/2.png' }}" class="img-fluid" /></a>
		</div>
		<div class="home-productc">
			<a href="#"><img src="{{ public_path().'/img/3.png' }}" class="img-fluid" /></a>
		</div>
		<div class="home-productc">
			<a href="#"><img src="{{ public_path().'/img/4.png' }}" class="img-fluid" /></a>
		</div>
		<div class="home-productc">
			<a href="#"><img src="{{ public_path().'/img/5.png' }}" class="img-fluid" /></a>
		</div>
		<div class="home-productc">
			<a href="#"><img src="{{ public_path().'/img/6.png' }}" class="img-fluid" /></a>
		</div>
	</div>
</div>
<div class="p-3 bg-light2">
	<div class="pb-1 d-flex justify-content-between">
		<h6 class="mb-2 text-black fw-bold ">Shop by category</h6>
		<a class="text-success text-decoration-none" href="#">SEE ALL <i class="bi bi-arrow-right-circle-fill"></i></a>
	</div>
	<div class="single-item selling-box">
		<div class="home-product">
			<a href="#">
				<img src="{{ public_path().'/img/cate/1.jpg' }}" class="img-fluid rounded-3 mb-1" alt="...">
				<img src="{{ public_path().'/img/cate/2.jpg' }}" class="img-fluid rounded-3" alt="...">
			</a>
		</div>
		<div class="home-product">
			<a href="#">
				<img src="{{ public_path().'/img/cate/3.jpg' }}" class="img-fluid rounded-3 mb-1" alt="...">
				<img src="{{ public_path().'/img/cate/4.jpg' }}" class="img-fluid rounded-3" alt="...">
			</a>
		</div>
		<div class="home-product">
			<a href="#">
				<img src="{{ public_path().'/img/cate/5.jpg' }}" class="img-fluid rounded-3 mb-1" alt="...">
				<img src="{{ public_path().'/img/cate/6.jpg' }}" class="img-fluid rounded-3" alt="...">
			</a>
		</div>
		<div class="home-product">
			<a href="#">
				<img src="{{ public_path().'/img/cate/7.jpg' }}" class="img-fluid rounded-3 mb-1" alt="...">
				<img src="{{ public_path().'/img/cate/8.jpg' }}" class="img-fluid rounded-3" alt="...">
			</a>
		</div>
	</div>
</div>
<div class="p-3 bg-light">
	<h6 class="mb-3 text-black fw-bold">Best selling products</h6>
	<div class="single-item selling-box">
		<div class="home-product">
			<div class="card border shadow-sm rounded-3">
				<img src="../../preview/karyana/img/listing/1.jpg" class="card-img-top rounded-3 p-3" alt="...">
				<div class="card-body p-2 border-top">
					<p class="card-text m-0 d-flex align-items-center">Atta & Flour <i class="bi bi-arrow-right ms-auto"></i></p>
				</div>
			</div>
		</div>
		<div class="home-product">
			<div class="card border shadow-sm rounded-3">
				<img src="../../preview/karyana/img/listing/2.jpg" class="card-img-top rounded-3 p-3" alt="...">
				<div class="card-body p-2 border-top">
					<p class="card-text m-0 d-flex align-items-center">Tea Bags <i class="bi bi-arrow-right ms-auto"></i></p>
				</div>
			</div>
		</div>
		<div class="home-product">
			<div class="card border shadow-sm rounded-3">
				<img src="../../preview/karyana/img/listing/3.jpg" class="card-img-top rounded-3 p-3" alt="...">
				<div class="card-body p-2 border-top">
					<p class="card-text m-0 d-flex align-items-center">Rice <i class="bi bi-arrow-right ms-auto"></i></p>
				</div>
			</div>
		</div>
		<div class="home-product">
			<div class="card border shadow-sm rounded-3">
				<img src="../../preview/karyana/img/listing/4.jpg" class="card-img-top rounded-3 p-3" alt="...">
				<div class="card-body p-2 border-top">
					<p class="card-text m-0 d-flex align-items-center">Bread <i class="bi bi-arrow-right ms-auto"></i></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="border-bottom border-top px-3 d-flex align-items-center justify-content-between">
	<ul class="nav home-tabs" id="pills-tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Biscuits</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Rice</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Detergents</button>
		</li>
	</ul>
	<a class="text-success text-decoration-none" href="../../preview/karyana/listing.html">SEE ALL <i class="bi bi-arrow-right-circle-fill"></i></a>
</div>
<div>
	<div>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<div class="osahan-listing">
					<div class="osahan-listing p-0 m-0 row">
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-success m-3 position-absolute">20% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/1.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">kissan Jam - Mixed Fruit,Tub</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹80.00 <small class="text-decoration-line-through text-muted small fw-light">₹100.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">500g <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div class="quantity-btn">
											<div class="input-group input-group-sm border rounded overflow-hiddem">
												<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
												<input type="text" class="form-control text-center box border-0" value="1" placeholder="" aria-label="Example text with button addon">
												<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-warning text-dark m-3 position-absolute">10% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/2.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">PARLE Glucose nutt Biscuits</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹75.00 <small class="text-decoration-line-through text-muted small fw-light">₹210.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">800g <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div>
											<a href="../../preview/karyana/bag.html" class="btn btn-success btn-sm d-flex border-0"><i class="bi bi-plus me-2"></i> ADD</a>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-warning text-dark m-3 position-absolute">10% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/3.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">Kellogg's Corn Flakes - Orignal</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹335.00 <small class="text-decoration-line-through text-muted small fw-light">₹410.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">1kg <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div class="quantity-btn">
											<div class="input-group input-group-sm border rounded overflow-hiddem">
												<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
												<input type="text" class="form-control text-center box border-0" value="1" placeholder="" aria-label="Example text with button addon">
												<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-success m-3 position-absolute">20% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/4.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">Cadbury Health Drink - Bourn</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹80.00 <small class="text-decoration-line-through text-muted small fw-light">₹100.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">500g <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div class="quantity-btn">
											<div class="input-group input-group-sm border rounded overflow-hiddem">
												<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
												<input type="text" class="form-control text-center box border-0" value="1" placeholder="" aria-label="Example text with button addon">
												<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-warning text-dark m-3 position-absolute">10% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/5.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">CREMICA Digestive Biscuits</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹75.00 <small class="text-decoration-line-through text-muted small fw-light">₹210.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">800g <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div class="quantity-btn">
											<div class="input-group input-group-sm border rounded overflow-hiddem">
												<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
												<input type="text" class="form-control text-center box border-0" value="1" placeholder="" aria-label="Example text with button addon">
												<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-warning text-dark m-3 position-absolute">10% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/6.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">TATA TEA GOLD CARE LEAF
									</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹335.00 <small class="text-decoration-line-through text-muted small fw-light">₹410.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">1kg <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div class="quantity-btn">
											<div class="input-group input-group-sm border rounded overflow-hiddem">
												<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
												<input type="text" class="form-control text-center box border-0" value="1" placeholder="" aria-label="Example text with button addon">
												<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
				<div class="d-flex bag-item position-relative p-3 border-bottom align-items-center">
					<div class="bag-item-left">
						<img src="../../preview/karyana/img/listing/1.jpg" class="img-fluid rounded-3 border" alt="...">
					</div>
					<div class="bag-item-right w-100">
						<div class="card-body pe-0 py-0">
							<span class="badge bg-success">20% OFF</span>
							<p class="card-text mb-0 mt-1 text-black">Parle-G Original Gluco Biscuit</p>
							<small class="text-muted"><i class="bi bi-shop me-1"></i> Seller - Private limited</small>
							<h5 class="card-title mt-2 mb-0 text-black fw-bold">₹80.00 <small class="text-decoration-line-through text-muted fs-6 fw-light">₹100.00</small></h5>
						</div>
					</div>
					<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
				</div>
				<div class="d-flex bag-item position-relative p-3 border-bottom align-items-center">
					<div class="bag-item-left">
						<img src="../../preview/karyana/img/listing/2.jpg" class="img-fluid rounded-3 border" alt="...">
					</div>
					<div class="bag-item-right w-100">
						<div class="card-body pe-0 py-0">
							<span class="badge bg-danger">50% OFF</span>
							<p class="card-text mb-0 mt-1 text-black">Parle Monaco Salted</p>
							<small class="text-muted"><i class="bi bi-shop me-1"></i> Seller - Private limited</small>
							<h5 class="card-title mt-2 mb-0 text-black fw-bold">₹50.00 <small class="text-decoration-line-through text-muted fs-6 fw-light">₹80.00</small></h5>
						</div>
					</div>
					<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
				</div>
				<div class="d-flex bag-item position-relative p-3 border-bottom align-items-center">
					<div class="bag-item-left">
						<img src="../../preview/karyana/img/listing/3.jpg" class="img-fluid rounded-3 border" alt="...">
					</div>
					<div class="bag-item-right w-100">
						<div class="card-body pe-0 py-0">
							<p class="card-text mb-0 mt-1 text-black">Parle Fab bourbon</p>
							<small class="text-muted"><i class="bi bi-shop me-1"></i> Seller - Private limited</small>
							<h5 class="card-title mt-2 mb-0 text-black fw-bold">₹20.00 <small class="text-decoration-line-through text-muted fs-6 fw-light">₹80.00</small></h5>
						</div>
					</div>
					<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
				</div>
				<div class="d-flex bag-item position-relative p-3 border-bottom align-items-center">
					<div class="bag-item-left">
						<img src="../../preview/karyana/img/listing/4.jpg" class="img-fluid rounded-3 border" alt="...">
					</div>
					<div class="bag-item-right w-100">
						<div class="card-body pe-0 py-0">
							<span class="badge bg-success">20% OFF</span>
							<p class="card-text mb-0 mt-1 text-black">Parle-G Original Gluco Biscuit</p>
							<small class="text-muted"><i class="bi bi-shop me-1"></i> Seller - Private limited</small>
							<h5 class="card-title mt-2 mb-0 text-black fw-bold">₹80.00 <small class="text-decoration-line-through text-muted fs-6 fw-light">₹100.00</small></h5>
						</div>
					</div>
					<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
				<div class="osahan-listing">
					<div class="osahan-listing p-0 m-0 row">
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-success m-3 position-absolute">20% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/1.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">kissan Jam - Mixed Fruit,Tub</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹80.00 <small class="text-decoration-line-through text-muted small fw-light">₹100.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">500g <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div class="quantity-btn">
											<div class="input-group input-group-sm border rounded overflow-hiddem">
												<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
												<input type="text" class="form-control text-center box border-0" value="1" placeholder="" aria-label="Example text with button addon">
												<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-warning text-dark m-3 position-absolute">10% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/6.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">TATA TEA GOLD CARE LEAF
									</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹335.00 <small class="text-decoration-line-through text-muted small fw-light">₹410.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">1kg <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div class="quantity-btn">
											<div class="input-group input-group-sm border rounded overflow-hiddem">
												<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
												<input type="text" class="form-control text-center box border-0" value="1" placeholder="" aria-label="Example text with button addon">
												<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-warning text-dark m-3 position-absolute">10% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/2.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">PARLE Glucose nutt Biscuits</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹75.00 <small class="text-decoration-line-through text-muted small fw-light">₹210.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">800g <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div>
											<a href="../../preview/karyana/bag.html" class="btn btn-success btn-sm d-flex border-0"><i class="bi bi-plus me-2"></i> ADD</a>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-warning text-dark m-3 position-absolute">10% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/5.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">CREMICA Digestive Biscuits</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹75.00 <small class="text-decoration-line-through text-muted small fw-light">₹210.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">800g <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div class="quantity-btn">
											<div class="input-group input-group-sm border rounded overflow-hiddem">
												<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
												<input type="text" class="form-control text-center box border-0" value="1" placeholder="" aria-label="Example text with button addon">
												<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-warning text-dark m-3 position-absolute">10% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/3.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">Kellogg's Corn Flakes - Orignal</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹335.00 <small class="text-decoration-line-through text-muted small fw-light">₹410.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">1kg <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div class="quantity-btn">
											<div class="input-group input-group-sm border rounded overflow-hiddem">
												<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
												<input type="text" class="form-control text-center box border-0" value="1" placeholder="" aria-label="Example text with button addon">
												<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
						<div class="text-dark col-6 px-0 border-bottom border-end position-relative">
							<div class="list_item_gird m-0 bg-white listing-item">
								<span class="badge bg-success m-3 position-absolute">20% OFF</span>
								<div class="list-item-img p-4">
									<img src="../../preview/karyana/img/listing/4.jpg" class="img-fluid p-3">
								</div>
								<div class="tic-div px-3 pb-3">
									<p class="mb-1 text-black">Cadbury Health Drink - Bourn</p>
									<h6 class="card-title mt-2 mb-3 text-success fw-bold">₹80.00 <small class="text-decoration-line-through text-muted small fw-light">₹100.00</small></h6>
									<div class="d-flex align-items-center justify-content-between gap-1">
										<div class="size-btn">
											<div class="input-group">
												<a href="#" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModala">500g <span><i class="bi bi-chevron-down small ms-2"></i></span></a>
											</div>
										</div>
										<div class="quantity-btn">
											<div class="input-group input-group-sm border rounded overflow-hiddem">
												<div class="btn btn-light text-success minus border-0 bg-white"><i class="bi bi-dash"></i></div>
												<input type="text" class="form-control text-center box border-0" value="1" placeholder="" aria-label="Example text with button addon">
												<div class="btn btn-light text-success plus border-0 bg-white"><i class="bi bi-plus"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="stretched-link" href="../../preview/karyana/bag.html"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

	


