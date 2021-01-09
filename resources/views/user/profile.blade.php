@extends('layouts.user_dashboard')

@section('content') 
<div class="container my-5">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="text-white">Profile</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="user_name" class="fw-bold">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $user->name)}}">
    
                    @error('name')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-4">
                    <label for="user_email" class="fw-bold">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email', $user->email)}}">
    
                    @error('email')
                        <div class="alert alert-danger mt-2">{{$message}}</div>
                    @enderror
                </div>
    
    
                <div class="form-group mb-4">
                    <label for="user_image" class="fw-bold d-block">Profile Image</label>
                    <img src="{{url('/images/'.$user->image)}}" alt="{{$user->name}}" height="150">
                    <div class="input-group mt-3">
                        <input type="file" class="form-control" name="user_image">
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{route('user')}}" class="btn btn-warning">Back</a>
                    <button class="btn btn-primary">Submit Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection