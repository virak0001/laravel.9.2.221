@extends('layout.app')
@section('body')
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
                <td>{{ $post->picture }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->category_name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
