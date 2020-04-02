@extends('frontend.templete')
@section('content')
<a href="{{ URL::to('teacher/create') }}" class="btn btn-danger">Add Teacher</a>
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
    @foreach ($teacher as $value)
    <tbody>
      <tr>
        <th scope="row">{{ $value->id }}</th>
        <td>{{ $value->name }}</td>
        <td>{{ $value->phone }}</td>
        <td>{{ $value->email }}</td>
        <td class="text-center">
            <a href="{{ URL::to('teacher/'.$value->id.'/edit') }}" class="btn btn-primary">Edit</a>
            <form action="{{ URL::to('teacher/'.$value->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            {{--  <a href="{{ URL::to('singleStudentDelete/'.$value->id) }}" class="btn btn-danger">Delete</a>  --}}
            <a href="{{ URL::to('teacher/'.$value->id) }}" class="btn btn-secondary">View</a>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
@endsection
