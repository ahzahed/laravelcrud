@extends('frontend.templete')
@section('content')
    <div class="col-lg-8 m-auto">
        <p>Student Name: {{ $student->name }}</p>
        <p>Phone Number: {{ $student->phone }}</p>
        <p>Email: {{ $student->email }}</p>
    </div>
@endsection
