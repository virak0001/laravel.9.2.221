@extends('layout.app')
@section('body')
<form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <h1 class="text-center">Edit Post</h1>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input required name="title" value="{{$post->title}}" class="form-control" id="title">
    <input hidden value="{{$post->id}}" class="form-control">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input required name="description" value="{{$post->description}}" class="form-control">
  </div>
  <select class="form-select form-select-sm" required name="category_id" aria-label=".form-select-sm example">
    <option selected>Choose category</option>
    @foreach ($categories as $category)
    <option value="{{$category->id}}">{{ $category->name }}</option>
    @endforeach
  </select>
  <div>
    <input class="form-control form-control-lg" name="picture" type="file">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection