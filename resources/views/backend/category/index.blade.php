@extends('backend.admin_layout')

@section('title')
Manage Category
@endsection

@section('admin-content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manage Categories</h1>
        <ol class="breadcrumb mb-4">
            {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
            <p class="text-success text-bold">{{Session::get('msg')}}</p>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All Categories
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @if (isset($category->image) && file_exists($category->image))
                                            <img src="{{asset($category->image)}}" style="width: 120px; height: 80px;" alt="">
                                        @else
                                            <img src="{{asset('assets/no-img.png')}}" style="width: 120px; height: 80px;" alt="">
                                        @endif
                                    </td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <a href="{{route('edit.product', $category->id)}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
