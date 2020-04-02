@extends('frontend/templete')
@section('content')
<a href="{{ route('allStudent') }}" class="btn btn-danger">All Student</a>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('storeStudent') }}" method="POST">
    @csrf
    <div class="control-group">
      <div class="form-group floating-label-form-group controls">
        <label>Student Name</label>
        <input type="text" class="form-control" placeholder="Student Name" name="name">
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Student Phone Number</label>
            <input type="number" class="form-control" placeholder="Phone Number" name="phone">
            <p class="help-block text-danger"></p>
        </div>
    </div>
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email">
            <p class="help-block text-danger"></p>
        </div>
    </div>

    <br>
    <div id="success"></div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
    </div>
  </form>

@endsection
