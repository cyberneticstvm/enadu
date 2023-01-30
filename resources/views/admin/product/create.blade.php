@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dash">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/product">Product</a></li>
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
                                <h3 class="card-title">Product Create</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.product.save') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="req">Product Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Product Name">
                                        </div>
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="req">Category</label>
                                            <select class="form-control" name="category_id">
                                                <option value="">Select</option>
                                                @forelse($categories as $key => $cat)
                                                <option value="{{ $cat->id }}" {{ ($cat->id == old('category_id')) ? 'selected': '' }}>{{ $cat->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        @error('category_id')
                                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="req">Price</label>
                                            <input type="number" class="form-control" step="any" min="1" name="price" value="{{ old('price') }}" placeholder="0.00">
                                        </div>
                                        @error('price')
                                        <small class="text-danger">{{ $errors->first('price') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="">Description</label>
                                            <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Description">
                                        </div>
                                        @error('description')
                                        <small class="text-danger">{{ $errors->first('description') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="req">Available for Service</label>
                                            <select class="form-control" name="available_for_service">
                                                <option value="">Select</option>
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select>
                                        </div>
                                        @error('available_for_service')
                                        <small class="text-danger">{{ $errors->first('available_for_service') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="req">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">Select</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                        @error('status')
                                        <small class="text-danger">{{ $errors->first('status') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="req">Product Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        @error('image')
                                        <small class="text-danger">{{ $errors->first('image') }}</small>
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