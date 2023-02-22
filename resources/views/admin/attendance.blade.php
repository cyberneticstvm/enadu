@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dash">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
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
                  <h3 class="card-title">Attendance List</h3>
                </div>
              </div>
              <div class="card-body table-responsive">
                <table id="dataTbl" class="table table-sm table-bordered table-striped">
                  <thead><tr><th>SL No</th><th>Staff Name</th><th>In Location</th><th>Out Location</th><th>Date</th><th>In</th><th>Out</th></tr></thead>
                    <tbody> @php $slno = 1; @endphp
                    @forelse($attendances as $key => $at)
                        <tr>
                            <td>{{ $slno++ }}</td>
                            <td>{{ $at->user()->find($at->user)->name }}</td>
                            <td>{{ $at->location }}</td>
                            <td>{{ $at->location }}</td>
                            <td>{{ date('d/M/Y', strtotime($at->date)) }}</td>
                            <td>{{ date('h:i a', strtotime($at->signin_time)) }}</td>
                            <td>{{ date('h:i a', strtotime($at->signout_time)) }}</td>
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