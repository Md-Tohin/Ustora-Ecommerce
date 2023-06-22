@extends('backend.admin_layout')

@section('title')
    Add Category
@endsection

@section('admin-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Category</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active"><a href="">Dashboard</a></li> --}}
            </ol>
            <div class="row pt-5">
                <div class="col-md-5 mx-auto bg-light py-4 px-4">
                    <div class="">
                        <div class="card-body">
                            <form action="{{route('store.category')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Long Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Choose Category Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Add Category</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
