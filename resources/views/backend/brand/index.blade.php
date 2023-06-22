@extends('backend.admin_layout')

@section('title')
Manage Brand
@endsection

@section('admin-content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manage Brands</h1>
        <ol class="breadcrumb mb-4">
            {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
            <p class="text-success text-bold">{{Session::get('msg')}}</p>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All Brands
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($brands as $brand)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>
                                        @if (isset($brand->image) && file_exists($brand->image))
                                            <img src="{{asset($brand->image)}}" style="width: 120px; height: 80px;" alt="">
                                        @else
                                            <img src="{{asset('assets/no-img.png')}}" style="width: 120px; height: 80px;" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($brand->status == 1)
                                            <span class="badge badge-pill bg-success">active</span>
                                        @else
                                            <span class="badge badge-pill bg-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('brands.edit', $brand->id)}}" class="btn btn-sm btn-success">Edit</a>
                                        <form action="{{route('brands.destroy', $brand->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
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
