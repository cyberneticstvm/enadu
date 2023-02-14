@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Service Requests</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dash">Home</a></li>
              <li class="breadcrumb-item active">Service Requests</li>
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
                  <h3 class="card-title">Service Request List</h3>
                </div>
              </div>
              <div class="card-body table-responsive">
                <table id="dataTbl" class="table table-sm table-bordered table-striped">
                  <thead><tr><th>SL No</th><th>Product Name</th><th>Address</th><th>Customer</th><th>Contact</th><th>Request Date</th></tr></thead>
                    <tbody> @php $slno = 1; @endphp
                    @forelse($services as $key => $serv)
                        <tr>
                            <td>{{ $slno++ }}</td>
                            <td>{{ $serv->product()->find($serv->product)->name }}</td>
                            <td>{{ $serv->address()->find($serv->address)->address }}</td>
                            <td>{{ $serv->user()->find($serv->created_by)->name }}</td>
                            <td>{{ $serv->user()->find($serv->created_by)->mobile }}</td>
                            <td>{{ $serv->created_at }}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
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