<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%'.$query.'%')->get();
        return view('product.search', compact('products'));
    }
}
