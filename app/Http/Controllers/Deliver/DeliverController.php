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
        // Auth::logout();
        // return redirect()->route('login');
    }
}
