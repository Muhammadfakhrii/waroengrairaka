<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validate input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Find product
        $product = Product::find($request->product_id);

        // Update or add to cart
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'image_url' => $product->image_url
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Product added to cart']);
    }

    public function updateQuantity(Request $request)
    {
        // Validate input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Find product
        $product = Product::find($request->product_id);

        // Update cart item quantity
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);

        // Return JSON response
        return response()->json(['message' => 'Cart updated']);
    }

    public function removeFromCart(Request $request)
    {
        // Validate input
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Remove product from cart
        $cart = session()->get('cart', []);

        if(isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
        }

        session()->put('cart', $cart);

        // Return JSON response
        return response()->json(['message' => 'Product removed from cart']);
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
}
