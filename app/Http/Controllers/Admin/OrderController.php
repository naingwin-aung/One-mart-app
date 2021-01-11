<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get()->filter(function ($order) {
            return $order->status == 1;
        });

        $status = array_flip(config('deliver.delivery_status'));

        return view('admin.orders.order', compact('orders', 'status'));
    }

    public function approve(Order $order)
    {
        $order->status = config('deliver.delivery_status.approve');
        $order->save();
        return redirect()->route('orders')->with('message', 'approve');
    }

    public function cancel(Order $order)
    {
        $order->status = config('deliver.delivery_status.cancel');
        $order->save();
        return redirect()->route('orders')->with('message', 'cancel');
    }
}
