@extends('layouts.user_dashboard')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-white">Yaung mae product</h3>
        </div>
        <div class="card-body">
            <form action="{{url('/user/products')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="product_name" class="fw-bold">Product Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
    
                    @error('name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-4">
                    <label for="product_price" class="fw-bold">Product Price</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
    
                    @error('price')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-4">
                    <label for="product_description" class="fw-bold">Product Description</label>
                    <textarea name="description" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
                </div>
    
                <div class="form-group mb-4">
                    <label for="product_image" class="fw-bold">Product Image</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('product_image') is-invalid @enderror" name="product_image">
                    </div>
    
                    @error('product_image')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="category" class="fw-bold">Category</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="" selected disabled>Choose category related this product</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-4">
                    <label for="phone" class="fw-bold">Phone to contact</label>
                    <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">

                    @error('phone')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>
    
                <div class="d-flex justify-content-between">
                    <a href="{{route('user')}}" class="btn btn-warning">Back</a>
                    <button class="btn btn-primary">Yaung Mal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection