@extends('layouts.store')

@section('content')
<div class="bg-slate-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-heading text-4xl font-bold text-slate-900 mb-10">Shopping Cart</h1>

        @if($cart && $cart->items->count() > 0)
            <div class="lg:grid lg:grid-cols-12 lg:gap-12 lg:items-start">
                <div class="lg:col-span-8">
                    <div class="bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm">
                        <ul class="divide-y divide-slate-100">
                            @php $total = 0; @endphp
                            @foreach($cart->items as $item)
                                @php $total += $item->product->price * $item->quantity; @endphp
                                <li class="p-6 flex py-8">
                                    <div class="flex-shrink-0 w-24 h-24 bg-slate-100 rounded-xl overflow-hidden self-center border border-slate-200">
                                        @if($item->product->image)
                                            <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="ml-6 flex-1 flex flex-col justify-center">
                                        <div class="flex justify-between">
                                            <div>
                                                <h4 class="font-semibold text-slate-900 text-lg"><a href="{{ route('products.show', $item->product) }}">{{ $item->product->name }}</a></h4>
                                                <p class="mt-1 text-sm text-slate-500">{{ $item->product->category->name ?? 'Uncategorized' }}</p>
                                            </div>
                                            <p class="font-bold text-slate-900 text-lg">${{ number_format($item->product->price, 2) }}</p>
                                        </div>
                                        
                                        <div class="mt-4 flex items-center justify-between">
                                            <form action="{{ route('cart.update', $item->product) }}" method="POST" class="flex items-center border border-slate-200 rounded-lg overflow-hidden h-10 w-32">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}" class="w-full border-none text-center focus:ring-0 text-sm font-medium text-slate-700 bg-slate-50" onchange="this.form.submit()">
                                            </form>

                                            <form action="{{ route('cart.destroy', $item->product) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm font-medium text-red-500 hover:text-red-600 px-3 py-1 rounded-md hover:bg-red-50 transition-colors">
                                                    Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="lg:col-span-4 mt-8 lg:mt-0">
                    <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm">
                        <h2 class="font-heading text-2xl font-bold text-slate-900 mb-6">Order Summary</h2>
                        <div class="flow-root">
                            <dl class="text-sm text-slate-600 divide-y divide-slate-100">
                                <div class="py-4 flex items-center justify-between">
                                    <dt>Subtotal</dt>
                                    <dd class="font-medium text-slate-900">${{ number_format($total, 2) }}</dd>
                                </div>
                                <div class="py-4 flex items-center justify-between">
                                    <dt>Shipping</dt>
                                    <dd class="font-medium text-emerald-600">Free</dd>
                                </div>
                                <div class="py-4 flex items-center justify-between font-bold text-lg text-slate-900 border-t border-slate-200">
                                    <dt class="font-heading">Order Total</dt>
                                    <dd>${{ number_format($total, 2) }}</dd>
                                </div>
                            </dl>
                        </div>
                        <div class="mt-8">
                            <a href="{{ route('checkout') }}" class="w-full bg-indigo-600 text-white font-semibold py-4 rounded-full shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:shadow-indigo-300 transition-all flex items-center justify-center gap-2">
                                Proceed to Checkout
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                        <div class="mt-6 text-center">
                            <a href="{{ route('products.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                or Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white rounded-3xl p-16 text-center border border-slate-100 shadow-sm max-w-3xl mx-auto py-24">
                <div class="w-24 h-24 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <h3 class="font-heading text-3xl font-bold text-slate-900">Your cart is empty</h3>
                <p class="text-slate-500 mt-4 text-lg">Looks like you haven't added anything to your cart yet.</p>
                <div class="mt-10">
                    <a href="{{ route('products.index') }}" class="inline-flex bg-indigo-600 text-white px-8 py-3.5 rounded-full font-medium shadow-md hover:bg-indigo-700 transition-colors">Start Shopping</a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
