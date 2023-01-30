@extends('base')
@section('content')
    <div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
        <div class="font-weight-normal mb-0 d-flex align-items-center">
            <h6 class="fw-normal mb-0 text-white d-flex align-items-center">
                <a class="text-white me-3 fs-4" href="signin.html"><i class="bi bi-chevron-left"></i></a>
                Verification
            </h6>
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
    <div class="p-5">
        <div class="text-center">
            <h4 class="fw-bold">Verifying your Mobile</h4>
            <p class="text-muted">We have sent 4 digit code on<br> {{ $user->mobile }}</p>
        </div>
        <form class="my-5" method="post" action="{{ route('otp.check') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}" />
            <div class="d-flex justify-content-center gap-3">
                <div class="col-2">
                    <input type="text" class="form-control form-control-lg text-center otp" value="" required minlength="1" maxlength="1" name="val1" placeholder="*" required>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control form-control-lg text-center otp" value="" required minlength="1" maxlength="1" name="val2" placeholder="*" required>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control form-control-lg text-center otp" value="" required minlength="1" maxlength="1" name="val3" placeholder="*" required>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control form-control-lg text-center otp" value="" required minlength="1" maxlength="1" name="val4" placeholder="*" required>
                </div>
            </div>
            <div class="mb-4 mt-4">
                <button type="submit" class="btn btn-submit btn-success btn-md w-100 shadow">VERIFY</button>
            </div>
        </form>
        <div class="text-center h6">
            Resend in <span class="text-danger">0.30</span>
        </div>
    </div>
@endsection