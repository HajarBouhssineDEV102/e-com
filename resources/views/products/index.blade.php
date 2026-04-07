@extends('layouts.store')

@section('content')
<div class="bg-white border-b border-slate-200 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-heading text-4xl font-bold text-slate-900 mb-6">Shop Collection</h1>
        
        <form action="{{ route('products.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-grow">
                <div class="relative">
                    <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition-shadow box-shadow text-slate-700 bg-slate-50 focus:bg-white leading-relaxed">
                </div>
            </div>
            <div class="w-full md:w-64">
                <select name="category" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none text-slate-700 bg-slate-50 focus:bg-white appearance-none h-full">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->name }}" {{ request('category') == $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-slate-900 text-white px-8 py-3 rounded-xl hover:bg-slate-800 transition-colors font-medium">Filter</button>
        </form>
    </div>
</div>

<div class="bg-slate-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <div class="group bg-white p-3 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <a href="{{ route('products.show', $product) }}" class="block relative rounded-2xl overflow-hidden bg-slate-100 aspect-square">
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                                    <span class="font-heading text-xl">Elevation.</span>
                                </div>
                            @endif
                        </a>
                        <div class="pt-5 px-2 pb-2">
                            <span class="text-[10px] font-bold text-indigo-500 uppercase tracking-widest bg-indigo-50 px-2 py-1 rounded-md">{{ $product->category->name ?? 'Category' }}</span>
                            <div class="flex justify-between items-start mt-3">
                                <div>
                                    <h3 class="font-semibold text-slate-900 text-lg leading-tight"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>
                                    <p class="text-indigo-600 font-bold mt-1">${{ number_format($product->price, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        @else
            <div class="bg-white rounded-3xl p-16 text-center border border-slate-100 shadow-sm">
                <div class="text-slate-300 mb-4 inline-flex">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-medium text-slate-900">No products found</h3>
                <p class="text-slate-500 mt-2">Try adjusting your filters or search terms.</p>
                <a href="{{ route('products.index') }}" class="mt-6 inline-block bg-indigo-50 text-indigo-600 px-6 py-2.5 rounded-full font-medium hover:bg-indigo-100 transition-colors">Clear Filters</a>
            </div>
        @endif
    </div>
</div>
@endsection
