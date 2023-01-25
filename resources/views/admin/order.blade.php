@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/order">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Order List</h3>
                </div>
              </div>
              <div class="card-body table-responsive">
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
                <div class="row">
                 @forelse($orders as $key => $order)
                    <div class="notification d-flex m-0 bg-white shadow-sm mb-1 p-3 col-md-3">
                        <div class="icon pe-3">
                            <span class="icofont-check-circled text-success mb-0 rounded-pill mt-1 fs-1 d-inline-block"></span>
                        </div>
                        <div class="noti-details l-hght-18 pr-0">
                            <p class="mb-1 fw-bold">Order ID: {{ $order->id }} ({{ $order->name }})</p>
                            <span class="small text-muted">Order Total: ₹{{ $order->amount }}</span><br>
                            <span>Order Created at: {{ date('d/M/Y h:i a', strtotime($order->created_at)) }}</span><br>
                            <a href="/admin/order-details/{{ $order->id }}" class="col btn btn-submit btn-success mt-3">ORDER DETAILS</a>
                        </div>
                    </div>
                 @empty
                    <div class="col">No New Orders!</div>
                 @endforelse
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
</div>
@endsection