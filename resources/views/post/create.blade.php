@extends('layout.app')
@section('body')
<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('POST')
  <h1 class="text-center">Create Post</h1>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input name="title" class="form-control" id="title">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
  </div>
  <select class="form-select form-select-sm" name="category_id" aria-label=".form-select-sm example">
    <option selected>Choose category</option>
    <option value="1">Three</option>
  </select>
  <div>
    <input class="form-control form-control-lg" name="picture" type="file">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection