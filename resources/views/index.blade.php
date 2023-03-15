@extends('base')
@section('content')
    <div class="landing-page bg-success">
        <div class="osahan-slider m-0">
            <div class="osahan-slider-item text-center">
                <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                    <!--<i class="icofont-food-basket display-1 text-white"></i>
                    <h5 class="mt-4 mb-3 text-white">No Minimum Order</h5>
                    <p class="text-center text-white-50 mb-5 px-5">Order in for yourself or for the group, with no restrictions on order value</p>-->
                    <img src="{{ public_path().'/img/img3.jpeg' }}" class="img-fluid" style="min-height:80%; width: 100%" alt="" />
                </div>
            </div>
            <div class="osahan-slider-item text-center bg-warning">
                <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                    <!--<i class="icofont-map-pins display-1 text-black"></i>
                    <h5 class="mt-4 mb-3 text-dark">Live Order Tracking</h5>
                    <p class="text-center text-dark-50 mb-5 px-5">Know where your order is at all times, from the restaurant to your doorstep</p>-->
                    <img src="{{ public_path().'/img/img1.jpeg' }}" class="img-fluid" style="min-height:80%; width: 100%" alt="" />
                </div>
            </div>
            <div class="osahan-slider-item text-center">
                <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                    <!--<i class="icofont-delivery-time display-1 text-white"></i>
                    <h5 class="mt-4 mb-3 text-white">Lightning-Fast Delivery</h5>
                    <p class="text-center text-white-50 mb-5 px-5">Experience Karyana's superfast delivery for food delivered fresh & on time</p>-->
                    <img src="{{ public_path().'/img/img2.jpeg' }}" class="img-fluid" style="min-height:80%; width: 100%" alt="" />
                </div>
            </div>
        </div>
    </div>
    <div class="osahan-footer fixed-bottom p-3">
        <a href="/account" class="btn btn-outline-success bg-white text-success btn-lg w-100 shadow">Get Started</a>
    </div>
@endsection