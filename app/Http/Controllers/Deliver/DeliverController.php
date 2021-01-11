<?php

namespace App\Http\Controllers\Deliver;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeliverController extends Controller
{
    public function index()
    {
        $orders = Order::get()->filter(function ($order) {
            return $order->status == 2;
        });

        return view('deliverers.order', compact('orders'));
    }

    public function delivering(Order $order)
    {
        $order->status = config('deliver.delivery_status.delivering');
        $order->save();
        return redirect()->route('delivery')->with('message', 'delivering');
    }
}
