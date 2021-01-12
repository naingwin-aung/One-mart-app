@extends('layouts.deliver_dashboard')

@section('content')

    <div class="container-fluid my-5">

        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Order has already <strong>{{session('message')}}</strong>!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Name</th>
                                <th>Order's Price</th>
                                <th>Order's User Name</th>
                                <th>Order's User Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->product->name}}</td>
                                    <td>{{$order->product->price}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>0{{$order->user->phone}}</td>
                                    <td>
                                        <a href="{{url("/delivery/order/$order->id/done")}}" class="btn btn-outline-success">Done</a>
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