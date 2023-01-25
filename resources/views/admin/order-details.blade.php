@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/order">Home</a></li>
              <li class="breadcrumb-item active">Order Details</li>
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
                  <h3 class="card-title">Order Details</h3>
                </div>
              </div>
              <div class="card-body table-responsive">
                <div class="row"><h3 class="card-title">Order ID: {{ $order->id }}</h3></div>
                <div class="row">
                 @forelse($order->order_details()->get() as $key => $item)
                    <div class="col notification d-flex m-0 bg-white shadow-sm mb-1 p-3">
                        Product: {{ $item->product_name->name }}<br>
                        Qty: {{ $item->qty }}<br>
                        Price: ₹{{ number_format($item->qty*$item->price, 2) }}
                    </div>
                 @empty
                    <div class="col">No New Orders!</div>
                 @endforelse
                </div>
                <form method="post" action="{{ route('admin.order.assign') }}">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}" />
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="req">Delivery Person</label>
                                <select class="form-control" name="delivery_person">
                                    <option value="">Select</option>
                                    @forelse($staffs as $key => $staff)
                                    <option value="{{ $staff->id }}" {{ ($staff_order && $staff_order->user_id == $staff->id) ? 'selected': '' }}>{{ $staff->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            @error('delivery_person')
                            <small class="text-danger">{{ $errors->first('delivery_person') }}</small>
                            @enderror
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="req">Order Status</label>
                                <select class="form-control" name="order_status">
                                  <option value="">Select</option>
                                    @forelse($status as $key => $stat)
                                    <option value="{{ $stat->id }}" {{ ($staff_order && $staff_order->order_status == $stat->id) ? 'selected': '' }}>{{ $stat->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            @error('order_status')
                            <small class="text-danger">{{ $errors->first('order_status') }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-submit btn-primary">Update</button>
                        </div>
                    </div>
                </form>
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