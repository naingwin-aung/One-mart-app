@extends('layouts.user_dashboard')

@section('content')
    <div class="container-fluid my-5">

        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Product has already <strong>{{session('message')}}</strong> Successful!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            
        <div class="row">
            <div class="col-12">
                <a href="{{url('/user/products/create')}}" class="btn btn-success mb-4">Yaung Mal</a>
                <div class="card p-3">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product description</th>
                                <th>Connect Phone Number</th>
                                <th>Product created Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>0{{$product->phone}}</td>

                                    <td>{{$product->created_at->diffForHumans()}} - {{$product->created_at->toFormattedDateString()}} - {{$product->created_at->format('H:i:s')}}</td>

                                    <td>
                                        <a href="{{url("/user/products/$product->id/edit")}}" class="btn btn-outline-warning">Edit</a>
                                        <form action="{{url("/user/products/$product->id")}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this product')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection