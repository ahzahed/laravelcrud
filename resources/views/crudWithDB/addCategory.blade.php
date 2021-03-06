@extends('frontend/templete')
@section('content')
<a href="{{ route('addCategory') }}" class="btn btn-primary">Add Category</a>
<a href="{{ route('viewCategory') }}" class="btn btn-danger">All Category</a>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('storeAddCategory') }}" method="POST">
    @csrf
    <div class="control-group">
      <div class="form-group floating-label-form-group controls">
        <label>Name</label>
        <input type="text" class="form-control" placeholder="Category Name" name="name" id="name">
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Slug</label>
            <input type="text" class="form-control" placeholder="Slug" name="slug" id="name">
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
