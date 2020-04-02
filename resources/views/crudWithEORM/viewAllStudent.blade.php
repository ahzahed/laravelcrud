@extends('frontend.templete')
@section('content')
<a href="{{ route('student') }}" class="btn btn-danger">Add Student</a>
<table class="table table-striped border">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th colspan="2" class="text-center">Action</th>
      </tr>
    </thead>
    @foreach ($student as $value)
    <tbody>
      <tr>
        <th scope="row">{{ $value->id }}</th>
        <td>{{ $value->name }}</td>
        <td>{{ $value->phone }}</td>
        <td>{{ $value->email }}</td>
        <td class="text-center">
            <a href="{{ URL::to('singleStudentEdit/'.$value->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ URL::to('singleStudentDelete/'.$value->id) }}" class="btn btn-danger">Delete</a>
            <a href="{{ URL::to('singleStudentView/'.$value->id) }}" class="btn btn-secondary">View</a>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
@endsection
