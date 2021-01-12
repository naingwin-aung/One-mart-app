@extends('layouts.admin_dashboard')

@section('content')

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <table id="example4" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Name</th>
                                <th>Order's Price</th>
                                <th>Order's User Name</th>
                                <th>Order's User Phone</th>
                                <th>Phone Number to contact of order</th>
                                <th>Delivery Date</th>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        $('#example4').DataTable({
            'ordering' : false,
        });
    } );
</script>