<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');        
    }
    
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.products.product', compact('products'));
    }

    public function show(Product $product)
    {
        return view('admin.products.product_show', compact('product'));
    }
}
