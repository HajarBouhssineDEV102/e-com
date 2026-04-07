@extends('layouts.store')

@section('content')
<div class="bg-slate-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-heading text-4xl font-bold text-slate-900 mb-10">Checkout</h1>

        <div class="lg:grid lg:grid-cols-12 lg:gap-12 lg:items-start">
            <div class="lg:col-span-7">
                <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm">
                    <h2 class="font-heading text-2xl font-bold text-slate-900 mb-6">Shipping Information</h2>
                    
                    <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <label for="shipping_address" class="block text-sm font-medium text-slate-700 mb-2">Delivery Address</label>
                                <textarea name="shipping_address" id="shipping_address" rows="3" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition-shadow bg-slate-50 focus:bg-white text-slate-800" placeholder="123 Main St, City, Country">{{ old('shipping_address', Auth::user()->address) }}</textarea>
                                @error('shipping_address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            
                            <div>
                                <label for="shipping_phone" class="block text-sm font-medium text-slate-700 mb-2">Phone Number</label>
                                <input type="text" name="shipping_phone" id="shipping_phone" required value="{{ old('shipping_phone', Auth::user()->phone) }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition-shadow bg-slate-50 focus:bg-white text-slate-800" placeholder="+1 (555) 000-0000">
                                @error('shipping_phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="pt-6 border-t border-slate-100">
                                <h3 class="text-sm font-medium text-slate-700 mb-4">Payment Method</h3>
                                <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 flex items-start gap-3">
                                    <input type="radio" checked class="mt-1 text-indigo-600 focus:ring-indigo-500">
                                    <div>
                                        <p class="font-medium text-indigo-900 leading-none">Cash on Delivery (COD)</p>
                                        <p class="text-sm text-indigo-700 mt-1">Pay with cash upon delivery.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-5 mt-8 lg:mt-0">
                <div class="bg-slate-900 rounded-3xl p-8 shadow-xl text-white">
                    <h2 class="font-heading text-2xl font-bold mb-6">Order Summary</h2>
                    
                    <ul class="divide-y divide-slate-800 mb-6">
                        @php $total = 0; @endphp
                        @foreach($cart->items as $item)
                            @php $total += $item->product->price * $item->quantity; @endphp
                            <li class="py-4 flex">
                                <div class="flex-1">
                                    <h4 class="font-medium">{{ $item->product->name }}</h4>
                                    <p class="text-slate-400 text-sm mt-1">Qty: {{ $item->quantity }}</p>
                                </div>
                                <p class="font-semibold">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                            </li>
                        @endforeach
                    </ul>

                    <div class="space-y-3 pt-6 border-t border-slate-800 text-sm text-slate-300">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="text-white">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span class="text-emerald-400 font-medium">Free</span>
                        </div>
                        <div class="flex justify-between pt-6 mt-4 border-t border-slate-800 font-bold text-xl text-white">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" form="checkout-form" class="w-full bg-white text-slate-900 font-bold py-4 rounded-full hover:bg-slate-100 transition-colors flex items-center justify-center gap-2">
                            Place Order Complete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
