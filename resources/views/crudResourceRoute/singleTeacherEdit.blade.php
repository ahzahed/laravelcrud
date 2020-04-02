@extends('frontend/templete')
@section('content')

<a href="{{ route('addCategory') }}" class="btn btn-primary">Add Category</a>
<a href="{{ route('viewCategory') }}" class="btn btn-danger">All Category</a>
<a href="{{ route('viewPost') }}" class="btn btn-danger">View Post</a>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ url('teacher/'.$teacher->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="control-group">
      <div class="form-group floating-label-form-group controls">
        <label>Student Name</label>
        <input type="text" class="form-control" value="{{ $teacher->name }}" name="name">
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Phone Number</label>
          <input type="number" class="form-control" value="{{ $teacher->phone }}" name="phone">
          <p class="help-block text-danger"></p>
        </div>
    </div>
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Tittle</label>
            <input type="email" class="form-control" value="{{ $teacher->email }}" name="email">
            <p class="help-block text-danger"></p>
        </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
    </div>
  </form>
@endsection
