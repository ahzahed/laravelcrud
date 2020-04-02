@extends('frontend.templete')
@section('content')
    <div class="col-lg-8 m-auto">
        <p>Student Name: {{ $teacher->name }}</p>
        <p>Phone Number: {{ $teacher->phone }}</p>
        <p>Email: {{ $teacher->email }}</p>
    </div>
@endsection
