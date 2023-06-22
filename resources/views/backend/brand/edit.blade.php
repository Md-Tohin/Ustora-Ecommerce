@extends('backend.admin_layout')

@section('title')
    Edit Brand
@endsection

@section('admin-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Brand</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active"><a href="">Dashboard</a></li> --}}
            </ol>
            <div class="row pt-5">
                <div class="col-md-5 mx-auto bg-light py-4 px-4">
                    <div class="">
                        <div class="card-body">
                            <form action="{{route('brands.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="hidden" name="old_image" value="{{$brand->image}}">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Brand Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$brand->name}}">
                                </div>


                                <div class="mb-3">
                                    <label for="image" class="form-label">Choose Brand Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>

                                <div class="mb-3">
                                    @if (isset($brand->image) && file_exists($brand->image))
                                        <img src="{{asset($brand->image)}}" style="width: 120px; height: 80px;" alt="">
                                    @else
                                        <img src="{{asset('assets/no-img.png')}}" style="width: 120px; height: 80px;" alt="">
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Update Brand</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
