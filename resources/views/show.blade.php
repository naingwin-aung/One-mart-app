@extends('layouts.master')

@section('content')
        <div class="pt-5"></div>
        <div class="mt-5 pt-2"></div>

        <div class="py-5 container d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-12 col-md-5 mt-4 mb-3">
                    <img src="{{url('/images/'.$product->image)}}" alt="$product->name" width="450" height="450">
                </div>
                <div class="col-12 col-md-7">
                    <small class="text-muted">{{$product->updated_at->diffForHumans()}} - {{$product->updated_at->toFormattedDateString()}}</small>
                    <h3>{{$product->name}}</h3>
                    <p class="mt-2 mb-4">Price: <b>{{$product->price}}</b></p>
                    <p>{{$product->description}}</p>
                    <p>Phone Number to contact: <b>0{{$product->phone}}</b></p>

                    <hr>

                    <h5>Seller</h5>
                    <p class="text-success">{{$product->user->name}}</p>
                </div>
            </div>
        </div>
@endsection