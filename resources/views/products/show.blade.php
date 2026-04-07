@extends('layouts.store')

@section('content')
<div class="bg-white border-b border-slate-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm font-medium text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Home</a>
            <span class="mx-2 text-slate-300">/</span>
            <a href="{{ route('products.index') }}" class="hover:text-indigo-600 transition-colors">Shop</a>
            <span class="mx-2 text-slate-300">/</span>
            <span class="text-slate-900">{{ $product->name }}</span>
        </nav>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
        <!-- Image Gallery -->
        <div>
            <div class="bg-slate-100 rounded-3xl overflow-hidden aspect-square border border-slate-200">
                @if($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                        <span class="font-heading text-4xl">Elevation.</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Product Details -->
        <div class="flex flex-col justify-center">
            <span class="text-sm font-bold text-indigo-600 uppercase tracking-widest mb-3">{{ $product->category->name ?? 'Category' }}</span>
            <h1 class="font-heading text-4xl md:text-5xl font-bold text-slate-900 leading-tight">{{ $product->name }}</h1>
            
            <div class="mt-6 flex items-baseline gap-4">
                <span class="text-3xl font-bold text-slate-900">${{ number_format($product->price, 2) }}</span>
            </div>

            <div class="mt-8 prose prose-slate text-slate-600">
                <p>{{ $product->description }}</p>
            </div>

            <div class="mt-10 border-t border-slate-100 pt-10">
                @if($product->stock > 0)
                    <form action="{{ route('cart.store', $product) }}" method="POST">
                        @csrf
                        <div class="flex gap-4">
                            <button type="submit" class="flex-1 bg-indigo-600 text-white font-semibold py-4 rounded-full shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:shadow-indigo-300 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                Add to Cart
                            </button>
                        </div>
                    </form>
                    <p class="text-sm font-medium text-emerald-600 mt-4 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> In Stock ({{ $product->stock }} available)
                    </p>
                @else
                    <button disabled class="w-full bg-slate-200 text-slate-500 font-medium py-4 rounded-full cursor-not-allowed">
                        Out of Stock
                    </button>
                @endif
            </div>
            
            <div class="mt-10 border-t border-slate-100 pt-8 mt-auto grid grid-cols-2 gap-4 text-sm text-slate-500">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    <span>Free Shipping Options</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    <span>Secure Checkout</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
