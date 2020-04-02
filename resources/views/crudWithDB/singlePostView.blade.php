@extends('frontend.templete')
@section('content')
    <div class="col-lg-8 m-auto">
        <p>Category Name: {{ $posts->name }}</p>
        <p>Category Slug: {{ $posts->slug }}</p>
        <h2>{{ $posts->title }}</h2>
        <img src="{{ URL::to($posts->image) }}" alt="Post Image" height="340px">
        <p>{{ $posts->details }}</p>
    </div>
@endsection
