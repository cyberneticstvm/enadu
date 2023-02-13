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
				<img src="{{ public_path().'/img/profile.jpg' }}" class="img-fluid rounded-pill me-3">
				<div class="text-white">
					<h6 class="mb-0">Hi {{ (Auth::user()) ? Auth::user()->name : 'Guest' }},</h6>
					<small>{{ (Auth::user()) ? Auth::user()->mobile : 'xxxxxxxxxx' }}</small><br>
					<span class="f-10 text-white-50">{{ (Auth::user()) ? Auth::user()->user_type : '' }}</span>
				</div>
			</a>
		</li>
		<li>
			<a href="/staff/orders"><i class="bi bi-code-square me-2"></i>Orders</a>
		</li>
        <li>
			<a href="/staff/meetings"><i class="bi bi-code-square me-2"></i>Meetings</a>
		</li>
		@if(Auth::user())
		<li>
			<a href="/logout"><i class="bi bi-power me-2"></i> Logout</a>
		</li>
		@endif
	</ul>
</nav>
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
		pickmylocation();
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
		function pickmylocation(){
			navigator.geolocation.getCurrentPosition(
				function (position) {
					var addr = getUserAddressBy(position.coords.latitude, position.coords.longitude);
				},
				function errorCallback(error) {
				console.log(error)
				}
			);
		}
		function getUserAddressBy(lat, long) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					var address = JSON.parse(this.responseText)
					var addr = address.results[0].formatted_address;
					document.getElementById('address').value = addr;
					document.getElementById('latitude').value = lat;
					document.getElementById('longitude').value = long;
				}
			};
			xhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+long+"&key={{config('app.google_api_key')}}", true);
			xhttp.send();
		}
	</script>
</body>
</html>