@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Comment Reply</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/feedback">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/feedback">Feedback</a></li>
                        <li class="breadcrumb-item active">Reply</li>
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
                                <h3 class="card-title">Reply comment</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.comment.reply') }}">
                                @csrf
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                <input type="hidden" name="feedback_category" value="reply" />
                                <div class="row">
                                    <div class="col-sm-12">
                                        Feedback: {{ $comment->comment }}
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <div class="form-group">
                                            <label class="req">Comment</label>
                                            <textarea class="form-control" name="comment" value="{{ old('comment') }}" placeholder="Comment" rows="5"></textarea>
                                        </div>
                                        @error('comment')
                                        <small class="text-danger">{{ $errors->first('comment') }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-submit btn-primary">Reply</button>
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