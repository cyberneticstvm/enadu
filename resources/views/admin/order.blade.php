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
                <form method="post" action="{{ route('admin.order.fetch') }}">
                  <div class="row">                  
                    @csrf
                    <div class="col-sm-3">
                      <label>From Date</label>
                      <input type="date" class="form-control" name="from_date" value="{{ ($inputs && $inputs[0]) ? $inputs[0] : '' }}" />
                    </div>
                    <div class="col-sm-3">
                      <label>To Date</label>
                      <input type="date" class="form-control" name="to_date" value="{{ ($inputs && $inputs[1]) ? $inputs[1] : '' }}" />
                    </div>
                    <div class="col-sm-3">
                      <label>Order Status</label>
                      <select class="form-control" name="status">
                        <option value="0">All</option>
                        @forelse($status as $key => $st)
                          <option value="{{ $st->id }}" {{ ($inputs && $inputs[2] == $st->id) ? 'selected' : '' }}>{{ $st->name }}</option>
                        @empty
                        @endforelse
                      </select>
                    </div>
                    <div class="col-sm-3 mt-3">
                      <button class="btn btn-success btn-submit mt-3" type="submit">Fetch</button>
                    </div>                  
                  </div>
                </form>
                <div class="row mt-5">
                 @forelse($orders as $key => $order)
                    <div class="notification d-flex m-0 bg-white shadow-sm mb-1 p-3 col-md-3">
                        <div class="icon pe-3">
                            <span class="icofont-check-circled text-success mb-0 rounded-pill mt-1 fs-1 d-inline-block"></span>
                        </div>
                        <div class="noti-details l-hght-18 pr-0">
                            <p class="mb-1 fw-bold">Order ID: {{ $order->id }} ({{ $order->name }})</p>
                            <span class="small text-muted">Order Total: ₹{{ $order->amount }}</span><br>
                            <span>Order Created at: {{ date('d/M/Y h:i a', strtotime($order->created_at)) }}</span><br>
                            <a href="/admin/order-details/{{ $order->id }}" class="col btn btn-success mt-3">ORDER DETAILS</a>
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