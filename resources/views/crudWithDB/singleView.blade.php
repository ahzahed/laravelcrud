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

    <tbody>
      <tr>
        <th scope="row">{{ $category->id }}</th>
        <td>{{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td class="text-center">
            <a href="" class="btn btn-primary">Edit</a>
            <a href="" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    </tbody>

  </table>
@endsection
