@extends('backend.admin_layout')

@section('title')
    Add Product
@endsection

@section('admin-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Product</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active"><a href="">Dashboard</a></li> --}}
            </ol>
            <div class="row pt-5">
                <div class="col-md-10 mx-auto bg-light py-4 px-4">
                    <div class="">
                        <div class="card-body">
                            <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>

                                        <div class="mb-3">
                                            <label for="price" class="form-label">Product Price</label>
                                            <input type="number" class="form-control" name="price" id="price">
                                        </div>

                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Product Quantity</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity">
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Choose Product Image</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Select Category</label>
                                            <div class="input-group">
                                                <select class="form-select" id="inputGroupSelect04"
                                                    aria-label="Example select with button addon" name="category_id">
                                                    <option selected>Choose One</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="short_description" class="form-label">Short Description</label>
                                            <textarea name="short_description" class="form-control" id="short_description" rows="3"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="long_description" class="form-label">Long Description</label>
                                            <textarea name="long_description" class="form-control" id="long_description" rows="3"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Add Product</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
