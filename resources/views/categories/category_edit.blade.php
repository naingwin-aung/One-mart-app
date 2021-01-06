@extends('layouts.admin_dashboard')

@section('content')
    <div class="container my-5">
        <div class="card p-3">
            <form action="{{url("/admin/categories/$category->id")}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label for="category_name" class="fw-bold">Category Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $category->name)}}">

                    @error('name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <img src="{{url('/images/'. $category->image)}}" alt="{{$category->name}}" height="150px">
                    <div class="input-group mt-3">
                        <input type="file" class="form-control" name="category_image">
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{route('admin')}}" class="btn btn-warning">Back</a>
                    <button class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection