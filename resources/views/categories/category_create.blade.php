@extends('layouts.admin_dashboard')

@section('content')
    <div class="container my-5">
        <div class="card p-3">
            <form action="{{url('categories')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="category_name" class="fw-bold">Category Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

                    @error('name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="category_image" class="fw-bold">Category Image</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('category_image') is-invalid @enderror" name="category_image">
                    </div>

                    @error('category_image')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{route('admin')}}" class="btn btn-warning">Back</a>
                    <button class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection