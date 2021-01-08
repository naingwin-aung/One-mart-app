@extends('layouts.admin_dashboard')

@section('content')
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-5 text-center pe-0">
                <img src="{{url('/images/'.$product->image)}}" alt="{{$product->name}}" style="width: 457px; height: 457px">
            </div>
            <div class="col-7 ps-0">
                <small class="text-muted">{{$product->created_at->diffForHumans()}} - {{$product->created_at->toFormattedDateString()}}</small>
                <h3>{{$product->name}}</h3>
                <p class="my-4">Price: <strong>{{$product->price}}</strong></p>

                <p>{{$product->description}}</p>
                <p class="mt-4">Contact phone number: <strong>0{{$product->phone}}</strong></p>
              
                <a href="{{route('admin.product')}}"  class="btn btn-warning mt-5">Back</a>
            </div>
        </div>
    </div>
@endsection