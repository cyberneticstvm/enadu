@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Meetings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dash">Home</a></li>
              <li class="breadcrumb-item active">Meetings</li>
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
                  <h3 class="card-title">Today's Meeting List</h3>
                </div>
              </div>
              <div class="card-body table-responsive">
                <table id="dataTbl" class="table table-sm table-bordered table-striped">
                  <thead><tr><th>SL No</th><th>Customer</th><th>Contact</th><th>Address</th><th>Distance</th><th>Staff</th><th>Date</tr></thead>
                    <tbody> @php $slno = 1; @endphp
                    @forelse($meetings as $key => $meet)
                        <tr>
                            <td>{{ $slno++ }}</td>
                            <td>{{ $meet->customer_name }}</td>
                            <td>{{ $meet->mobile }}</td>
                            <td>{{ $meet->location }}</td>
                            <td>{{ $meet->distance }}</td>
                            <td>{{ $meet->user()->find($meet->created_by)->name }}</td>
                            <td>{{ $meet->created_at }}</td>
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