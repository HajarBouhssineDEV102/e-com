@extends('layouts.store')

@section('content')
<div class="bg-slate-50 min-h-screen py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-6 flex items-center justify-between">
            <h1 class="font-heading text-3xl font-bold text-slate-900">Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h1>
            <a href="{{ route('orders.index') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 flex items-center gap-1">
                <svg class="w-4 h-4" transform="scale(-1, 1)" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                Back to Orders
            </a>
        </div>

        <div class="bg-white border border-slate-100 rounded-3xl shadow-sm overflow-hidden mb-8">
            <div class="px-8 py-6 border-b border-slate-100 bg-slate-50/50 flex flex-wrap gap-8 justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Date Placed</p>
                    <p class="font-medium text-slate-900">{{ $order->created_at->format('F d, Y') }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Total Amount</p>
                    <p class="font-bold text-slate-900">${{ number_format($order->total_price, 2) }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Status</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium capitalize
                        {{ $order->status === 'pending' ? 'bg-amber-100 text-amber-800' : '' }}
                        {{ $order->status === 'paid' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $order->status === 'shipped' ? 'bg-indigo-100 text-indigo-800' : '' }}
                        {{ $order->status === 'delivered' ? 'bg-emerald-100 text-emerald-800' : '' }}">
                        {{ $order->status }}
                    </span>
                </div>
            </div>

            <div class="p-8">
                <h3 class="font-heading text-xl font-bold text-slate-900 mb-6">Items Delivered</h3>
                <ul class="divide-y divide-slate-100 mb-8 max-h-[400px] overflow-y-auto">
                    @foreach($order->items as $item)
                        <li class="py-4 flex gap-4">
                            <div class="w-20 h-20 bg-slate-100 rounded-xl overflow-hidden flex-shrink-0">
                                @if($item->product->image)
                                    <img src="{{ Storage::url($item->product->image) }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="flex-1 flex flex-col justify-center">
                                <h4 class="font-medium text-slate-900">{{ $item->product->name }}</h4>
                                <p class="text-sm text-slate-500 mt-1">Qty: {{ $item->quantity }} x ${{ number_format($item->price, 2) }}</p>
                            </div>
                            <div class="flex items-center">
                                <p class="font-bold text-slate-900">${{ number_format($item->quantity * $item->price, 2) }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <h3 class="font-heading text-xl font-bold text-slate-900 mb-4 pt-6 border-t border-slate-100">Shipping Details</h3>
                <div class="bg-slate-50 rounded-2xl p-6">
                    <p class="text-slate-700 leading-relaxed">{{ $order->shipping_address }}</p>
                    <p class="text-slate-700 mt-2 font-medium">Phone: <span class="font-normal text-slate-600">{{ $order->shipping_phone }}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
