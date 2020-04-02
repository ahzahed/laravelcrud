@extends('frontend/templete')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach ($posts as $value)
      <div class="post-preview">
        <a href="post.html">
          <h2 class="post-title">
            {{ $value->title }}
          </h2>
          <img src="{{ URL::to($value->image) }}" width="200px" alt="">
          <h3 class="post-subtitle">
            {{ $value->details }}
          </h3>
        </a>
        <p class="post-meta">Category Name:
          <a href="#">{{ $value->name }}</a>
          on Slug {{ $value->slug }}</p>
      </div>
      <hr>
      @endforeach
      {{ $posts->links() }}
    </div>

  </div>
@endsection
