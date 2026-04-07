<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->first();
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('products.index');
        }
        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'shipping_phone' => 'required|string',
        ]);

        $cart = Cart::with('items.product')->where('user_id', auth()->id())->first();
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('products.index');
        }

        $totalPrice = $cart->items->sum(function($item) {
            return $item->quantity * $item->product->price;
        });

        $order = auth()->user()->orders()->create([
            'status' => 'pending',
            'total_price' => $totalPrice,
            'shipping_address' => $request->shipping_address,
            'shipping_phone' => $request->shipping_phone,
        ]);

        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
            // stock reduction
            if ($item->product->stock >= $item->quantity) {
                $item->product->decrement('stock', $item->quantity);
            }
        }

        $cart->items()->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully');
    }
    
    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        return view('orders.show', compact('order'));
    }
}
