<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Liexa">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/png" href="{{ public_path().'/img/brand.png' }}">
	<title>Enadu</title>
	<link rel="canonical" href="https://askbootstrap.com/preview/karyana/home.html" />
	<link href="{{ public_path().'/vendor/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet">
	<link href="{{ public_path().'/vendor/icons/icofont.min.css' }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{ public_path().'/bootstrap-icons_1.8.1/font/bootstrap-icons.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ public_path().'/vendor/slick/slick.min.css' }}" />
	<link rel="stylesheet" type="text/css" href="{{ public_path().'/vendor/slick/slick-theme.min.css' }}" />
	<link href="{{ public_path().'/css/style.css' }}" rel="stylesheet">
	<link href="{{ public_path().'/css/custom.css' }}" rel="stylesheet">
	<link href="{{ public_path().'/vendor/sidebar/demo.css' }}" rel="stylesheet">
</head>
<body class="mb-5 pb-5">

@yield('content')

<nav id="main-nav">
	<ul class="second-nav">
		<li>
			<a href="#" class="bg-success sidebar-user d-flex align-items-center py-4 px-3 border-0 mb-0">
				<img src="{{ public_path().'/img/profile.jpg' }}" class="img-fluid rounded-pill me-3">
				<div class="text-white">
					<h6 class="mb-0">Hi {{ (Auth::user()) ? Auth::user()->name : 'Guest' }},</h6>
					<small>{{ (Auth::user()) ? Auth::user()->mobile : 'xxxxxxxxxx' }}</small><br>
					<span class="f-10 text-white-50">{{ (Auth::user()) ? Auth::user()->user_type : '' }}</span>
				</div>
			</a>
		</li>
		<li>
			<a href="/account"><i class="bi bi-code-square me-2"></i> Splash</a>
		</li>
		<li>
			<a href="/account"><i class="bi bi-file-break me-2"></i> Landing</a>
		</li>
		<li>
			<a href="/account"><i class="bi bi-ui-checks-grid me-2"></i> Get Started</a>
		</li>
		<li>
			<a href="#"><i class="bi bi-lock me-2"></i> Authentication</a>
			<ul>
				<li><a href="../../preview/karyana/signin.html">Sign In</a></li>
				<li><a href="../../preview/karyana/signup.html">Sign Up</a></li>
				<li><a href="../../preview/karyana/change-password.html">Change Password</a></li>
				<li><a href="../../preview/karyana/verification.html">Verification</a></li>
			</ul>
		</li>
		<li><a href="../../preview/karyana/home.html"><i class="bi bi-house me-2"></i> Homepage</a></li>
		<li><a href="../../preview/karyana/gift-card.html"><i class="bi bi-award me-2"></i> Offers</a></li>
		<li><a href="../../preview/karyana/listing.html"><i class="bi bi-list-task me-2"></i> Listing</a></li>
		<li><a href="../../preview/karyana/bag.html"><i class="bi bi-bag me-2"></i> Bag</a></li>
		<li>
			<a href="#"><i class="bi bi-person me-2"></i> Profile Pages</a>
			<ul>
				<li><a href="../../preview/karyana/my-order.html"> My Order</a></li>
				<li><a href="../../preview/karyana/order-confirm.html"> Order Confirm</a></li>
				<li><a href="../../preview/karyana/order-detail.html"> Order Detail</a></li>
				<li><a href="../../preview/karyana/add-address.html"> Add Address</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="bi bi-clipboard me-2"></i> Extra Pages</a>
			<ul>
				<li><a href="../../preview/karyana/support.html">Support</a></li>
				<li><a href="../../preview/karyana/notification.html">Notification</a></li>
				<li><a href="../../preview/karyana/empty.html"> Empty Cart</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="bi bi-link-45deg me-2"></i> Navigation Link Example</a>
			<ul>
				<li>
					<a href="#">Link Example 1</a>
					<ul>
						<li>
							<a href="#">Link Example 1.1</a>
							<ul>
								<li><a href="#">Link</a></li>
								<li><a href="#">Link</a></li>
								<li><a href="#">Link</a></li>
								<li><a href="#">Link</a></li>
								<li><a href="#">Link</a></li>
							</ul>
						</li>
						<li>
							<a href="#">Link Example 1.2</a>
							<ul>
								<li><a href="#">Link</a></li>
								<li><a href="#">Link</a></li>
								<li><a href="#">Link</a></li>
								<li><a href="#">Link</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li><a href="#">Link Example 2</a></li>
				<li><a href="#">Link Example 3</a></li>
				<li><a href="#">Link Example 4</a></li>
				<li data-nav-custom-content>
					<div class="custom-message">
						You can add any custom content to your navigation items. This text is just an example.
					</div>
				</li>
			</ul>
		</li>
		@if(Auth::user())
		<li>
			<a href="/logout"><i class="bi bi-power me-2"></i> Logout</a>
		</li>
		@endif
	</ul>
	<ul class="bottom-nav">
		<li class="email">
			<a class="text-success nav-item text-center" href="../../preview/karyana/home.html" tabindex="0" role="menuitem">
				<p class="h5 m-0"><i class="icofont-ui-home text-success"></i></p>
				Home
			</a>
		</li>
		<li class="github">
			<a href="../../preview/karyana/gift-card.html" class="nav-item text-center" tabindex="0" role="menuitem">
				<p class="h5 m-0"><i class="icofont-sale-discount"></i></p>
				Offer
			</a>
		</li>
		<li class="ko-fi">
			<a href="../../preview/karyana/support.html" class="nav-item text-center" tabindex="0" role="menuitem">
				<p class="h5 m-0"><i class="icofont-support-faq"></i></p>
				Help
			</a>
		</li>
	</ul>
</nav>
<div class="modal fade" id="exampleModala" tabindex="-1" aria-labelledby="exampleModalLabela" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered m-0">
		<div class="modal-content modal-content rounded-0 border-0 vh-100">
			<div class="modal-header">
				<h6 class="modal-title fw-bold" id="exampleModalLabela">Select Quantity</h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="btn-group osahan-btn-group w-100 d-flex flex-column" role="group" aria-label="Basic radio toggle button group">
					<input type="radio" class="btn-check" name="btnradioq" id="btnradio1q" autocomplete="off" checked="">
					<label class="btn btn-outline-light d-flex align-items-center gap-3 rounded px-3 py-2" for="btnradio1q">
						<h6 class="mb-0 fw-bold">Small</h6>
						<span class="ms-auto fw-bold fs-6">Rs.85 <i class="bi bi-check-circle-fill ms-3"></i></span>
					</label>
					<input type="radio" class="btn-check" name="btnradioq" id="btnradio2q" autocomplete="off">
					<label class="btn btn-outline-light d-flex align-items-center gap-3 rounded mt-2 px-3 py-2" for="btnradio2q">
						<h6 class="mb-0 fw-bold">Medium</h6>
						<span class="ms-auto fw-bold fs-6">Rs.99 <i class="bi bi-check-circle-fill ms-3"></i></span>
					</label>
					<input type="radio" class="btn-check" name="btnradioq" id="btnradio2qq" autocomplete="off">
					<label class="btn btn-outline-light d-flex align-items-center gap-3 rounded mt-2 px-3 py-2" for="btnradio2qq">
						<h6 class="mb-0 fw-bold">Large</h6>
						<span class="ms-auto fw-bold fs-6">Rs.109 <i class="bi bi-check-circle-fill ms-3"></i></span>
					</label>
				</div>
			</div>
			<div class="modal-footer d-flex align-items-center justify-content-between fixed-bottom">
				<button type="button" class="col btn btn-outline-success" data-bs-dismiss="modal">Add to Bag</button>
				<button type="button" class="col btn btn-success" data-bs-dismiss="modal">Buy Now</button>
			</div>
		</div>
	</div>
</div>
<script src="{{ public_path().'/vendor/jquery/jquery.min.js' }}" type="2b1840b241899e59fb500706-text/javascript"></script>
	<script src="{{ public_path().'/vendor/bootstrap/js/bootstrap.bundle.min.js' }}" type="2b1840b241899e59fb500706-text/javascript"></script>
	<script type="2b1840b241899e59fb500706-text/javascript" src="{{ public_path().'/vendor/slick/slick.min.js' }}"></script>
	<script type="2b1840b241899e59fb500706-text/javascript" src="{{ public_path().'/vendor/sidebar/hc-offcanvas-nav.js' }}"></script>
	<script src="{{ public_path().'/js/custom.js' }}" type="2b1840b241899e59fb500706-text/javascript"></script>
	<script src="{{ public_path().'/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js' }}" data-cf-settings="2b1840b241899e59fb500706-|49" defer=""></script>
	<script defer src="{{ public_path().'/js/beacon.min.js' }}" data-cf-beacon='{"rayId":"78a8f0ac1822c328","version":"2022.11.3","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}'></script>
	<script type="2b1840b241899e59fb500706-text/javascript" src="{{ public_path().'/js/script.js' }}"></script>
</body>
</html>