@extends('backend.master')
@section('content')
<form method="POST">
    @csrf
    <div class="container">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label >Content</label>
            <input type="text" name="content" class="form-control">
          </div>
          <div class="form-group">
            <label >Image</label>
            <input type="file" name="image" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection