@extends('backend.admin_layout')

@section('title')
    Add Slider
@endsection

@section('admin-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Slider</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active"><a href="">Dashboard</a></li> --}}
            </ol>
            <div class="row pt-5">
                <div class="col-md-5 mx-auto bg-light py-4 px-4">
                    <div class="">
                        <div class="card-body">
                            <form action="{{route('store.slider')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="title" class="form-label">Slider Title</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>

                                <div class="mb-3">
                                    <label for="sub_title" class="form-label">Slider Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title" id="sub_title">
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Choose Slider Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Add Slider</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
