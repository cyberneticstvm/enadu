@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dash">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/category">Category</a></li>
                        <li class="breadcrumb-item active">Update</li>
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
                                <h3 class="card-title">Category Update</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.category.update', $category->id) }}">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label class="req">Category Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Category Name">
                                        </div>
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
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