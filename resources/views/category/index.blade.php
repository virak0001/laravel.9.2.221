@extends('layout.app')
@section('body')
<div class="text-center d-flex justify-content-between">
    <h6 class="heading" style="margin-left: 40%;">Categories list</h6>
    <button type="button" class="btn_add_category btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa fa-plus"></i>
    </button>
</div>
<div class="mt-4 justify-content-center">
    <div class="row g-0">
        @foreach ($categories as $category)
        <div class="col-md-4 p-1">
            <div class="cards bg-white p-1">
                <div style="font-size: 0.5rem;" class="d-flex justify-content-end">
                    <i class="fas fa-pen fa-2x text-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$category->id}}" style="margin-right: 5;"></i>
                    <i class="fas fa-trash fa-2x text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$category->id}}" style="margin-right: 5;"></i>
                </div>
                <div class="first p-1 text-center">
                    <h5>{{ $category->name }}</h5>
                    <p class="line1">{{ $category->description }}</p>
                </div>
            </div>
        </div>
        <!-- Modale delete category -->
        <div class="modal right fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('categories.destroy', $category->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            Are you sure want to delete this category?
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
        <!-- Modale update category -->
        <div class="modal right fade" id="editModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Name</label>
                                <input type="text" class="form-control" hidden name="name" value="{{$category->id}}" id="recipient-name" placeholder="Name">
                                <input type="text" class="form-control" name="name" value="{{$category->name}}" id="recipient-name" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Description</label>
                                <input type="text" class="form-control" name="description" value="{{$category->description}}" id="recipient-name" placeholder="description">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End modale update category -->
        @endforeach
    </div>
</div>
<div class="modal right fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea class="form-control" name="description" id="message-text" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<style scoped="scss">
    .cards {
        transition: all 0.2s ease;
        cursor: pointer
    }

    .cards:hover {
        box-shadow: rgba(0, 0, 0, 0.4) 0px 30px 90px;
    }

    .heading {
        font-size: 20px;
        font-weight: 600;
        color: #3D5AFE
    }

    .btn_add_category {
        display: block;
        height: 50px;
        width: 50px;
        border-radius: 50%;
        border: 1px solid red;
        float: right;
    }
</style>