@extends('backend.admin_layout')

@section('title')
Manage Product
@endsection

@section('admin-content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manage Products</h1>
        <ol class="breadcrumb mb-4">
            {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
            <h4 class="text-success text-bold">{{Session::get('msg')}}</h4>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All Products
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        @if (isset($product->image) && file_exists($product->image))
                                            <img src="{{asset($product->image)}}" style="width: 120px; height: 80px;" alt="">
                                        @else
                                            <img src="{{asset('assets/no-img.png')}}" style="width: 120px; height: 80px;" alt="">
                                        @endif
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category_id}}</td>

                                    <td>{{$product->price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        <a href="{{route('edit.product', $product->id)}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{route('delete.product', $product->id)}}" class="btn btn-sm btn-danger">Delete</a>
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
