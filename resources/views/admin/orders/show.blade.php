@extends('layouts.admin')
@section('header', 'Order Details')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.orders.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm flex items-center gap-1">
        &larr; Back to Orders
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="md:col-span-2 space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Order Items</h3>
            <ul class="divide-y divide-gray-100">
                @foreach($order->items as $item)
                <li class="py-4 flex gap-4">
                    <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                        @if($item->product && $item->product->image)
                            <img src="{{ Storage::url($item->product->image) }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-900">{{ $item->product->name ?? 'Deleted Product' }}</p>
                        <p class="text-sm text-gray-500">Qty: {{ $item->quantity }} x ${{ number_format($item->price, 2) }}</p>
                    </div>
                    <div class="font-semibold text-gray-900">
                        ${{ number_format($item->quantity * $item->price, 2) }}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Customer Details</h3>
            <p class="font-medium text-gray-800">{{ $order->user->name ?? 'N/A' }}</p>
            <p class="text-sm text-gray-600 mt-1">{{ $order->user->email ?? 'N/A' }}</p>
            <p class="text-sm text-gray-600 mt-1">{{ $order->user->phone ?? 'N/A' }}</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Shipping Info</h3>
            <p class="text-sm text-gray-600">{{ $order->shipping_address }}</p>
            <p class="text-sm text-gray-600 mt-2">Phone: {{ $order->shipping_phone }}</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Summary</h3>
            <div class="flex justify-between font-bold text-xl text-gray-900 border-t border-gray-100 pt-4 mt-4">
                <span>Total</span>
                <span>${{ number_format($order->total_price, 2) }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
