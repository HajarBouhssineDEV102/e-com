<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product')->firstOrCreate(
            ['user_id' => auth()->id()]
        );
        return view('cart.index', compact('cart'));
    }

    public function store(Request $request, Product $product)
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        
        $cartItem = $cart->items()->where('product_id', $product->id)->first();
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $cart = Cart::where('user_id', auth()->id())->first();
        if ($cart) {
            $cart->items()->where('product_id', $product->id)->update(['quantity' => $request->quantity]);
        }
        return redirect()->route('cart.index')->with('success', 'Cart updated');
    }

    public function destroy(Product $product)
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        if ($cart) {
            $cart->items()->where('product_id', $product->id)->delete();
        }
        return redirect()->route('cart.index')->with('success', 'Product removed from cart');
    }
}
