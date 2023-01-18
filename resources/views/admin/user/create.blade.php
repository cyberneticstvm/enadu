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
                        <li class="breadcrumb-item"><a href="/admin/staff">Staff</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                                <h3 class="card-title">Staff Create</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.staff.save') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="req">Staff Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Staff Name">
                                        </div>
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="req">Mobile Number</label>
                                            <input type="text" class="form-control" name="mobile" maxlength="10" value="{{ old('mobile') }}" placeholder="Mobile Number">
                                        </div>
                                        @error('mobile')
                                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="req">Password</label>
                                            <input type="password" class="form-control" name="password" maxlength="10" value="{{ old('password') }}" placeholder="******">
                                        </div>
                                        @error('password')
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-submit btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
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
@endsection