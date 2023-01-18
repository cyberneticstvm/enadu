@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Staff</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dash">Home</a></li>
              <li class="breadcrumb-item active">Staff</li>
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
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Staff List</h3>
                  <a href="/admin/staff/create"><i class="fa fa-plus text-success fa-2x"></i></a>
                </div>
              </div>
              <div class="card-body table-responsive">
                <table id="dataTbl" class="table table-sm table-bordered table-striped">
                  <thead><tr><th>SL No</th><th>Staff Name</th><th>Mobile</th><th>Type</th><th>Edit</th><th>Delete</th></tr></thead>
                    <tbody> @php $slno = 1; @endphp
                    @forelse($users as $key => $user)
                        <tr>
                            <td>{{ $slno++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user->user_type }}</td>
                            <td><a class='btn btn-link' href="{{ route('admin.staff.edit', $user->id) }}"><i class="fas fa-edit text-warning"></i></a></td>
                            <td>
                                <form method="post" action="{{ route('admin.staff.delete', $user->id) }}">
                                    @csrf 
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-link" onclick="javascript: return confirm('Are you sure want to delete this Record?');"><i class="fa fa-trash text-danger"></i></button>
                                </form>
                            </td>
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