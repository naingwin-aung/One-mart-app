@extends('layouts.admin_dashboard')

@section('content')

    <div class="container-fluid my-5">
        
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Description</th>
                                <th>User Name</th>
                                <th>Product created Time</th>
                                <th>Product updated Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->user->name}}</td>
                                    <td>{{$product->created_at->diffForHumans()}} - {{$product->created_at->toFormattedDateString()}} - {{$product->created_at->format('H:i:s')}}</td>

                                    <td>{{$product->updated_at->toFormattedDateString()}} - {{$product->updated_at->format('H:i:s')}}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-warning">View</a>
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