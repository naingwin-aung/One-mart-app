@extends('layouts.user_dashboard')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-white">Update product</h3>
        </div>
        <div class="card-body">
            <form action="{{url("/user/products/$product->id")}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label for="product_name" class="fw-bold">Product Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $product->name)}}">
    
                    @error('name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-4">
                    <label for="product_price" class="fw-bold">Product Price</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price', $product->price)}}">
    
                    @error('price')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-4">
                    <label for="product_description" class="fw-bold">Product Description</label>
                    <textarea name="description" cols="30" rows="10" class="form-control">{{old('description', $product->description)}}</textarea>
                </div>
    
                <div class="form-group mb-4">
                    <img src="{{url('/images/'.$product->image)}}" alt="{{$product->name}}" height="150">
                    <div class="input-group mt-3">
                        <input type="file" class="form-control" name="product_image">
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label for="category" class="fw-bold">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
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
                    <button class="btn btn-primary">Update product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection