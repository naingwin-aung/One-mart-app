@extends('layouts.admin_dashboard')

@section('content')

    <div class="container-fluid my-5">

        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Category has already <strong>{{session('message')}}</strong> Successful!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="row">
            <div class="col-12">
                <a href="{{url('/admin/categories/create')}}" class="btn btn-success mb-4">New Category</a>
                <div class="card p-3">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Category created Time</th>
                                <th>Category updated Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at->diffForHumans()}} - {{$category->created_at->toFormattedDateString()}} - {{$category->created_at->format('H:i:s')}}</td>

                                    <td>{{$category->updated_at->toFormattedDateString()}} - {{$category->updated_at->format('H:i:s')}}</td>
                                    <td>
                                        <a href="{{url("/admin/categories/$category->id/edit")}}" class="btn btn-outline-warning">Edit</a>
                                        <form action="{{url("/admin/categories/$category->id")}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this category')">Delete</button>
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
@endsection