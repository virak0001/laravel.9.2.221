@extends('layout.app')
@section('body')
<a href="{{route('posts.create')}}">
    <i class="fa fa-plus"></i>Create Post
</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Picture</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td><img src="{{asset('upload/'.$post->picture)}}" width="100" style="border-radius: 25px;" height="100" alt="User" /></td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->category_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection