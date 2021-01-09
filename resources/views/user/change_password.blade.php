@extends('layouts.user_dashboard')

@section('content')
    <div class="container mt-5">
        <div class="card p-3">
            <form action="" method="POST">
                @csrf
                @method("PUT")
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
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
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>
    
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success active">Change Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection