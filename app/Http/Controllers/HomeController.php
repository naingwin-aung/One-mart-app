<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }
    
    public function categoryAll(Request $request, $category_id)
    {
        if($request->searchkey) {
            $products = Product::query()->where('name', 'LIKE', "%{$request->searchkey}%")->where('category_id', $category_id)->paginate('4');
        } else {
            $products = Product::where('category_id', $category_id)->paginate('4');
        }

        return view('product_all', compact('products'));
    }

    public function productDetail(Product $product)
    {
        return view('product_show', compact('product'));
    }

    public function userDetail(User $user)
    {
        $products = Product::where('user_id', $user->id)->paginate('4');
        return view('user_detail', compact('user', 'products'));
    }
}
