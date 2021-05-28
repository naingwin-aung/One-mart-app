@extends('layouts.user_dashboard')

@section('content')
    <div class="container mt-5">
        <div class="card p-5 border-0 shadow">
            <form action="" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
    
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>
    
                <div class="d-flex justify-content-between">
                    <a href="{{route("user")}}" class="btn btn-warning">Back</a>
                    <button class="btn btn-success">Change Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection