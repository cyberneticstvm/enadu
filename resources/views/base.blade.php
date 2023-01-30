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
<!--<div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header sticky-top">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h4 class="m-0 fw-bold text-black">E<span class="text-success">nadu</span></h4>
		<div class="ms-auto d-flex align-items-center">
			<a href="/login" class="me-3 text-dark fs-5"><i class="bi bi-person-circle"></i></a>
			<a href="/cart" class="me-3 text-dark fs-5"><i class="bi bi-basket"></i></a>
			<a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
</div>-->

@yield('content')

<nav id="main-nav">
	<ul class="second-nav">
		<li>
			<a href="#" class="bg-success sidebar-user d-flex align-items-center py-4 px-3 border-0 mb-0">
				<img src="{{ public_path().'/img/avatar.png' }}" class="img-fluid rounded-pill me-3">
				<div class="text-white">
					<h6 class="mb-0">Hi {{ (Auth::user()) ? Auth::user()->name : 'Guest' }},</h6>
					<small>{{ (Auth::user()) ? Auth::user()->mobile : 'xxxxxxxxxx' }}</small><br>
					<span class="f-10 text-white-50">{{ (Auth::user()) ? Auth::user()->user_type : '' }}</span>
				</div>
			</a>
		</li>
		<li>
			<a href="/orders"><i class="bi bi-code-square me-2"></i>My Orders</a>
		</li>
		<li>
			<a href="/address"><i class="bi bi-file-break me-2"></i>My Addresses</a>
		</li>
		@if(Auth::user())
		<li>
			<a href="/logout"><i class="bi bi-power me-2"></i> Logout</a>
		</li>
		@endif
	</ul>
	<ul class="bottom-nav">
		<li class="email">
			<a class="text-success nav-item text-center" href="/" tabindex="0" role="menuitem">
				<p class="h5 m-0"><i class="icofont-ui-home text-success"></i></p>
				Home
			</a>
		</li>
		<li class="github">
			<a href="/" class="nav-item text-center" tabindex="0" role="menuitem">
				<p class="h5 m-0"><i class="icofont-sale-discount"></i></p>
				Offer
			</a>
		</li>
		<li class="ko-fi">
			<a href="/" class="nav-item text-center" tabindex="0" role="menuitem">
				<p class="h5 m-0"><i class="icofont-support-faq"></i></p>
				Help
			</a>
		</li>
	</ul>
</nav>
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered m-0">
		<div class="modal-content modal-content rounded-0 border-0 vh-100">
			<div class="modal-header">
				<h6 class="modal-title fw-bold" id="addressModalLabel">Add New Address</h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{ route('address.save') }}">
					@csrf
					<input type="hidden" name="type" id="addrcat" value="cart" />
					<div class="mb-4">
						<label class="form-label text-muted small mb-1">Name</label>
						<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
							<span class="input-group-text bg-white"><i class="bi bi-person text-muted"></i></span>
							<input type="text" class="form-control" name="contact_name" placeholder="Enter Name" required>
						</div>
					</div>
					<div class="mb-4">
						<label class="form-label text-muted small mb-1">Mobile</label>
						<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
							<span class="input-group-text bg-white"><i class="bi bi-phone text-muted"></i></span>
							<input type="text" class="form-control" name="mobile" maxlength="10" placeholder="Enter Mobile" required>
						</div>
					</div>
					<div class="mb-4">
						<label class="form-label text-muted small mb-1">Address</label>
						<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
							<span class="input-group-text bg-white"><i class="bi bi-geo-alt text-muted"></i></span>
							<input type="text" class="form-control" name="address1" placeholder="Enter Address" required>
						</div>
						@error('address1')
						<small class="text-danger">{{ $errors->first('address1') }}</small>
						@enderror
					</div>
					<div class="mb-4">
						<label class="form-label text-muted small mb-1">Location</label>
						<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
							<span class="input-group-text bg-white"><i class="bi bi-geo-alt text-muted"></i></span>
							<input type="text" class="form-control" name="address" id="address" placeholder="Enter Location" required>
						</div>
						<input type="hidden" name="latitude" id="latitude" value="" />
						<input type="hidden" name="longitude" id="longitude" value="" />
					</div>
					<div class="mb-4">
						<label class="form-label text-muted small mb-1">District</label>
						<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
							<span class="input-group-text bg-white"><i class="bi bi-bank text-muted"></i></span>
							<select class="form-control" name="district" required>
								<option value="">Select</option>
								@forelse($districts as $key => $district)
								<option value="{{ $district->id }}">{{ $district->name }}</option>
								@empty
								@endforelse
							</select>
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label text-muted small mb-1">Landmark</label>
						<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
							<span class="input-group-text bg-white"><i class="bi bi-geo text-muted"></i></span>
							<input type="text" class="form-control" name="landmark" placeholder="Landmark" required>
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label text-muted small mb-1">Pincode</label>
						<div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
							<span class="input-group-text bg-white"><i class="bi bi-geo text-muted"></i></span>
							<input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" required>
						</div>
					</div>
					<div class="input-group p-3">   
						<button type="submit" class="col btn btn-submit btn-success">Save</button>    
					</div>
				</form>
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

	<script src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_api_key')}}&libraries=places">
		</script>

	<script type="2b1840b241899e59fb500706-text/javascript" src="{{ public_path().'/js/script.js' }}"></script>

	<script>
		var options = {
		componentRestrictions: {country: "in"}
		};
		window.addEventListener('load', initialize);
		function initialize() {
			var input = document.getElementById('address');
			var autocomplete = new google.maps.places.Autocomplete(input, options);
			autocomplete.addListener('place_changed', function () {
				var place = autocomplete.getPlace();
				$('#latitude').val(place.geometry['location'].lat());
				$('#longitude').val(place.geometry['location'].lng());
			});
		}
	</script>
</body>
</html>