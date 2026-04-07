@extends('layouts.admin')
@section('header', 'Products')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-lg font-medium text-gray-900">Manage Products</h3>
    <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">Add New Product</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">
                <th class="px-6 py-4">Product</th>
                <th class="px-6 py-4">Category</th>
                <th class="px-6 py-4">Price</th>
                <th class="px-6 py-4">Stock</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($products as $product)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 flex items-center gap-4">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <span class="font-medium text-gray-900">{{ $product->name }}</span>
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $product->category->name ?? '-' }}</td>
                <td class="px-6 py-4 font-medium text-gray-900">${{ number_format($product->price, 2) }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $product->stock }}</td>
                <td class="px-6 py-4 text-right">
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:text-red-700 text-sm font-medium ml-3">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $products->links() }}
    </div>
</div>
@endsection
