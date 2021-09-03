@extends('layout.app')
@section('body')
<div class="text-center">
    <h6 class="heading">Categories list</h6>
    <button type="button" class="btn_add_category btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa fa-plus"></i>
    </button>
</div>
<div class="mt-4 justify-content-center">
    <div class="row g-0">
        @foreach ($categories as $category)
        <div class="col-md-4">
            <div class="cards">
                <div class="first bg-white p-4 text-center">
                    <h5>{{ $category->name }}</h5>
                    <p class="line1">{{ $category->description }}</p>
                </div>
            </div>
        </div>
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
        box-shadow: 5px 6px 6px 2px #e9ecef;
        transform: scale(1.1)
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