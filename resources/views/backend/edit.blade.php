@extends('backend.master')
@section('content')
<form method="POST">
    @csrf
    <div class="container">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ $inote->title }}" class="form-control">
          </div>
          <div class="form-group">
            <label >Content</label>
            <input type="text" name="content" value="{{ $inote->content }}" class="form-control">
          </div>
          <div class="form-group">
            <label >Image</label>
            <input type="file" name="image" value="{{ $inote->image }}" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection