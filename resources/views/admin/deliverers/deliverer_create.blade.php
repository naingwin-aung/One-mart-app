@extends('layouts.admin_dashboard')

@section('content')
    <div class="container my-5">
        <div class="card p-3">
            <form action="{{url('/admin/deliverer')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="deliverer_name" class="fw-bold">Deliverer Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

                    @error('name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="deliverer_email" class="fw-bold">Deliverer Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">

                    @error('email')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="deliverer_phone" class="fw-bold">Deliverer Phone</label>
                    <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">

                    @error('phone')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="deliverer_image" class="fw-bold">Deliverer's Image</label>
                    <div class="input-group">
                        <input type="file" class="form-control @error('user_image') is-invalid @enderror" name="user_image">
                    </div>

                    @error('user_image')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="deliverer_password" class="fw-bold">Deliverer Password</label>
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">

                    @error('password')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{route('deliverer')}}" class="btn btn-warning">Back</a>
                    <button class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection