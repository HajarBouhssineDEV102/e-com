@extends('layouts.store')

@section('content')
<div class="bg-slate-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-heading text-4xl font-bold text-slate-900 mb-10">My Orders</h1>

        @if($orders->count() > 0)
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100 text-sm font-medium text-slate-500 uppercase tracking-wider">
                                <th class="py-4 px-6">Order ID</th>
                                <th class="py-4 px-6">Date</th>
                                <th class="py-4 px-6">Total</th>
                                <th class="py-4 px-6">Status</th>
                                <th class="py-4 px-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($orders as $order)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-5 px-6 font-medium text-slate-900">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                    <td class="py-5 px-6 text-slate-500">{{ $order->created_at->format('M d, Y') }}</td>
                                    <td class="py-5 px-6 font-semibold text-slate-900">${{ number_format($order->total_price, 2) }}</td>
                                    <td class="py-5 px-6">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium capitalize
                                            {{ $order->status === 'pending' ? 'bg-amber-100 text-amber-800' : '' }}
                                            {{ $order->status === 'paid' ? 'bg-blue-100 text-blue-800' : '' }}
                                            {{ $order->status === 'shipped' ? 'bg-indigo-100 text-indigo-800' : '' }}
                                            {{ $order->status === 'delivered' ? 'bg-emerald-100 text-emerald-800' : '' }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td class="py-5 px-6 text-right">
                                        <a href="{{ route('orders.show', $order) }}" class="text-indigo-600 font-medium hover:text-indigo-800">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-white rounded-3xl p-16 text-center border border-slate-100 shadow-sm py-24">
                <div class="text-slate-300 mb-4 inline-flex">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <h3 class="font-heading text-2xl font-bold text-slate-900">No orders yet</h3>
                <p class="text-slate-500 mt-2">When you place an order, it will show up here.</p>
                <div class="mt-8">
                    <a href="{{ route('products.index') }}" class="inline-flex bg-indigo-600 text-white px-8 py-3 rounded-full font-medium shadow-md hover:bg-indigo-700 transition-colors">Start Shopping</a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
