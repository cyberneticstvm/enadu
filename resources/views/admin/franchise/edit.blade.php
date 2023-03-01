@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Franchise</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dash">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/category">Franchise</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                                <h3 class="card-title">Franchise Update</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.franchise.update', $fr->id) }}">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label class="req">Franchise Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $fr->name }}" placeholder="Franchise Name">
                                        </div>
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label class="req">Franchise Mobile</label>
                                            <input type="text" class="form-control" name="mobile" maxlength="10" value="{{ $fr->mobile }}" placeholder="Mobile">
                                        </div>
                                        @error('mobile')
                                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label class="req">Franchise Address</label>
                                            <textarea class="form-control" name="address" placeholder="Address">{{ $fr->address }}</textarea>
                                        </div>
                                        @error('address')
                                        <small class="text-danger">{{ $errors->first('address') }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 text-right">
                                        <button type="submit" class="btn btn-submit btn-primary">Update</button>
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