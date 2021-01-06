<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('products.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.product_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $imageName = date('YmdHis'). "." . $request->product_image->getClientOriginalExtension();
        $request->product_image->move(public_path('images'), $imageName);

        $product->image = $imageName;

        $product->category_id = $request->category_id;
        $product->phone = $request->phone;

        $product->user_id = auth()->user()->id;

        $product->save();
        return redirect()->route('user')->with('message', 'posted');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.product_edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if($request->product_image) {
            $imageName = date('YmdHis'). "." . $request->product_image->getClientOriginalExtension();
            $request->product_image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        if($request->phone) {
            $product->phone = $request->phone;
        }

        $product->save();
        
        return redirect()->route('user')->with('message', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('user')->with('message', 'deleted');

    }
}
