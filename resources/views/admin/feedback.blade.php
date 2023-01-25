@extends('admin.base')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Feedback</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/feedback">Home</a></li>
              <li class="breadcrumb-item active">Feedback</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12" id="accordion">
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
                  <h3 class="card-title">Feedback List</h3>
                </div>
              </div>
              <div class="card-body">
                @forelse($feedbacks as $key => $feed)
                <a class="d-block w-100" data-toggle="collapse" href="#feed_{{ $feed->user_id }}">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            {{ $feed->user->name }}
                        </h4>
                    </div>
                </a>
                <div id="feed_{{ $feed->user_id }}" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        @php $comments = App\Models\Feedback::where('user_id', $feed->user_id)->get(); @endphp
                        @forelse($comments as $c => $com)
                        <div class="card-title w-100 border-bottom">
                            {{ $com->comment }}<br>
                            <div class="text-right"><small>Commented On: {{ date('d/M/Y h:i a', strtotime($com->created_at)) }}</small></div>
                        </div>                       
                        @empty
                        <div>No comments</div>
                        @endforelse
                    </div>
                </div>
                @empty
                <div class="row">
                    <div class="col">
                        No Feedback Found!
                    </div>
                </div>
                @endforelse
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