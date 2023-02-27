@extends('base')
@section('content')
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
	<div class="font-weight-normal mb-0 d-flex align-items-center">
		<h6 class="fw-normal mb-0 text-white d-flex align-items-center">
			<a class="text-white me-3 fs-4" href="/account"><i class="bi bi-chevron-left"></i></a>
			About Us
		</h6>
		<div class="ms-auto d-flex align-items-center">
			<a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
		</div>
	</div>
</div>
<div class="row p-4">
    <div class="col">
        <h5>About Us</h5>
        <p>
        ENADU YUVAJANA CO-OPERATIVE SOCIETY K 1233 has been formed in 2021 under Chief Ministers
		100 days Mission Project. Kerala is facing too many issues in Waste management sector; Enadu is
		aiming to make our state clean and healthy by using the force, vision and ability of youth. As the
		first step we are concentrating in Source level waste management solutions. We tied-up with Foab
		Solutions Pvt Ltd, a start-up company working in Start-ups Valley TBI, Amaljyothi College of
		Engineering, Kanjirappally. Foab Solutions Pvt Ltd is the Kerala Suchitwa Mission approved
		manufacturer of GEEBIN - a Multi-Layer Aerobic Composter Bin for managing source level household
		bio-wastes.
        </p>
        <p>
        ENADU is approved by Kerala Suchitwa Mission to deliver services to LSGD’s in Kerala. We are
		approved Service Providers of GEEBIN and also authorised to distribute Biogas Plants. By delivering
		quality products and assuring good waste management education and services to beneficiaries and
		LSGD’s, Enadu believes we can create more job opportunities to youngsters in this field and make a
		good impact in this sector.
        </p>
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
@endsection