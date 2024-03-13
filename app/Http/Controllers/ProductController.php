<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        if($request->input('category')){
            $products->whereHas('category', function($query) use ($request){
                $query->where('name', $request->input('category'));
            });
        }

        $products->orderBy('featured', 'desc');
        $products->orderBy('name', 'asc');

        $products = $products->get();
        $categories = Category::all();

        return view('home', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
