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
            <td><i class="fas fa-trash fa-2x text-danger" data-bs-toggle="modal" data-bs-target="#deletePost{{$post->id}}" style="margin-right: 5;"></i></td>
            <td> <a href="{{route('posts.edit', $post->id)}}"><span class="material-icons"><i class="fas fa-pen fa-2x text-danger" style="margin-right: 5;"></i></td></span></a></td>
        </tr>
        <!-- Modale delete category -->
        <div class="modal right fade" id="deletePost{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('posts.destroy', $post->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            Are you sure want to delete this Post?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End modale delete category -->
        @endforeach
    </tbody>
</table>
@endsection