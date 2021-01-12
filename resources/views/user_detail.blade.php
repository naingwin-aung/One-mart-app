@extends('layouts.master')

@section('content')
    <div class="pt-5"></div>
    <div class="mt-5 pt-2"></div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-3 mb-3">
                <img src="{{url('/images/'. $user->image)}}" alt="{{$user->name}}" class="img-fluid">
            </div>
            <div class="col-12 col-md-4 ps-5">
                <h2>{{$user->name}}</h2>
                <p class="mt-4">Phone to Contact: <b>0{{$user->phone}}</b></p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center pb-4 fw-bold">
            ​ကြော်ငြာများ
        </h2>
        <div class="coloredline mt-0"></div>
        <div class="row mt-4 user-detail">
            @foreach ($products as $product)
                <div class="col-6 col-md-3 mb-4">
                    <div class="card rounded-0" style="width: 100%;">
                        <a href="{{url("/product/detail/$product->id")}}">
                            <img src="{{url('/images/'.$product->image)}}" class="product-card rounded-0" alt="{{$product->name}}">
                        </a>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <a href="{{url("/product/detail/$product->id")}}" class="p-name text-muted">
                               {{substr($product->name, 0, 25)}}
                            </a>
                            <p class="card-text text-success">{{number_format($product->price)}} ကျပ်</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-end">
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection