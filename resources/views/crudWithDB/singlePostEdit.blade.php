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
<form action="{{ url('singlePostStore/'.$posts->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="control-group">
      <div class="form-group floating-label-form-group controls">
        <label>Tittle</label>
        <input type="text" class="form-control" value="{{ $posts->title }}" name="title" id="name">
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <div class="control-group">
      <div class="form-group controls">
        <label>Categories</label>

        <select class="form-control" name="category_id" id="">
            @foreach ($category as $value)
            <option value="{{ $value->id }}" <?php if($value->id == $posts->category_id) echo "selected"; ?> >{{ $value->name }}</option>
            @endforeach
        </select>

      </div>
    </div>
    <div class="control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
        <label>Picture</label>
        <input type="file" class="form-control" placeholder="Upload Image" name="image" id="phone">
        <p class="help-block text-danger"></p>
        <input type="hidden" name="old_photo" value="{{ $posts->image }}">
      </div>
    </div>
    <div class="control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
          <h5>Old Photo:</h5>
          <img src="{{ URL::to($posts->image) }}" alt="Old Photo" width="200px" height="200px">
        </div>
    </div>
    <div class="control-group">
      <div class="form-group floating-label-form-group controls">
        <label>Message</label>
        <textarea rows="5" class="form-control" name="details" id="message">{{ $posts->details }}</textarea>
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
    </div>
  </form>
@endsection
