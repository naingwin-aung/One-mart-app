@extends('layouts.master')

@section('content')

    @if (count($products) != 0)
        <div class="container-fluid px-0 search-form d-flex justify-content-center align-items-center">
            <div class="card p-2" style="width: 80%">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchkey" placeholder="Search Products for this category">
                            <div class="input-group-append">
                              <button type="submit" class="input-group-text">search</button>
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container my-5 product-all">

            <?php $cat = explode("/", $_SERVER['PATH_INFO'])[2] ?>

            <a href="{{url("/category/{$cat}/all")}}" class="text-decoration-none text-success fs-bold border-2 border-bottom">All products for this category</a>

            <div class="row mt-4">
                @foreach ($products as $product)
                    <div class="col-6 col-md-3 mb-4">
                        <div class="card rounded-0" style="width: 100%;">
                            <a href="{{url("/product/detail/$product->id")}}">
                                <img src="{{url('/images/'.$product->image)}}" class="img-card rounded-0" alt="{{$product->name}}">
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
    @else
        <div class="container-fluid px-0 search-form-bottom d-flex justify-content-center align-items-center">
            <div class="card" style="width: 80%">
                <div class="card-header py-3 text-center">
                    <strong class="text-danger mt-2"> &#9785; Products for this category Not Found!</strong> 
                </div>
            </div>
        </div>
    @endif
@endsection