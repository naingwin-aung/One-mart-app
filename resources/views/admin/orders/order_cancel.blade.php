@extends('layouts.admin_dashboard')

@section('content')

    <div class="container-fluid my-5">
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
                                <th>Phone Number to contact of order</th>
                                <th>Cancel Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->product->name}}</td>
                                    <td>{{$order->product->price}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>0{{$order->user->phone}}</td>
                                    <td>0{{$order->product->phone}}</td>
                                    <td>{{$order->updated_at->toFormattedDateString()}} - {{$order->updated_at->format('H:i:s')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection