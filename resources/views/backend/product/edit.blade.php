@extends('backend.admin_layout')

@section('title')
    Edit Product
@endsection

@section('admin-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Product</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active"><a href="">Dashboard</a></li> --}}
            </ol>
            <div class="row pt-5">
                <div class="col-md-10 mx-auto bg-light py-4 px-4">
                    <div class="">
                        <div class="card-body">
                            <form action="{{ route('update.product') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$product['id']}}">
                                <input type="hidden" name="old_image" value="{{$product['image']}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$product['name']}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="price" class="form-label">Product Price</label>
                                            <input type="number" class="form-control" name="price" id="price" value="{{$product['price']}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Product Quantity</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity" value="{{$product['quantity']}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Choose Product Image</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>

                                        <div class="mb-3">
                                            @if (isset($product->image) && file_exists($product->image))
                                                <img src="{{asset($product->image)}}" style="width: 120px; height: 80px;" alt="">
                                            @else
                                                <img src="{{asset('assets/no-img.png')}}" style="width: 120px; height: 80px;" alt="">
                                            @endif
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
                                                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="short_description" class="form-label">Short Description</label>
                                            <textarea name="short_description" class="form-control" id="short_description" rows="3">{{$product['short_description']}}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="long_description" class="form-label">Long Description</label>
                                            <textarea name="long_description" class="form-control" id="long_description" rows="3">{{$product['long_description']}}</textarea>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Update Product</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
