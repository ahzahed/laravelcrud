@extends('frontend.templete')
@section('content')
<table class="table table-striped border">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Category</th>
        <th scope="col">Title</th>
        <th scope="col">Details</th>
        <th scope="col">Image</th>
        <th colspan="2" class="text-center">Action</th>
      </tr>
    </thead>
    @foreach ($posts as $value)
    <tbody>
      <tr>
        <th scope="row">{{ $value->id }}</th>
        <td>{{ $value->name }}</td>
        <td>{{ $value->title }}</td>
        <td>{{ $value->details }}</td>
        <td><img src="{{ URL::to($value->image) }}" alt="Post Image" height="40px" width="70"></td>
        <td class="text-center">
            <a href="{{ URL::to('singlePostUpdate/'.$value->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ URL::to('singlePostDelete/'.$value->id) }}" class="btn btn-danger">Delete</a>
            <a href="{{ URL::to('singlePostView/'.$value->id) }}" class="btn btn-secondary">View</a>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
@endsection
