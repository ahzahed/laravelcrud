@extends('frontend.templete')
@section('content')
<table class="table table-striped border">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Slug</th>
        <th colspan="2" class="text-center">Action</th>
      </tr>
    </thead>
    @foreach ($category as $value)
    <tbody>
      <tr>
        <th scope="row">{{ $value->id }}</th>
        <td>{{ $value->name }}</td>
        <td>{{ $value->slug }}</td>
        <td class="text-center">
            <a href="{{ URL::to('singleUpdate/'.$value->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ URL::to('singleDelete/'.$value->id) }}" class="btn btn-danger">Delete</a>
            <a href="{{ URL::to('singleView/'.$value->id) }}" class="btn btn-secondary">View</a>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
@endsection
