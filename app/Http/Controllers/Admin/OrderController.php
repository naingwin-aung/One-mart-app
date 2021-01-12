<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');        
    }
    
    public function index()
    {
        $orders = Order::get()->filter(function ($order) {
            return $order->status == 1;
        });

        return view('admin.orders.order', compact('orders'));
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

    public function orderCancel()
    {
        $orders = Order::get()->filter(function ($orders) {
            return $orders->status == 3;
        });

        return view('admin.orders.order_cancel', compact('orders'));
    }

    public function orderDelivering()
    {
        $orders = Order::orderBy('updated_at', 'DESC')->get()->filter(function ($orders) {
            return $orders->status == 4;
        });

        return view('admin.orders.order_delivering', compact('orders'));
    }

    public function orderDone()
    {
        $orders = Order::orderBy('updated_at', 'DESC')->get()->filter(function ($orders) {
            return $orders->status == 5;
        });

        return view('admin.orders.order_finish', compact('orders'));
    }
}
