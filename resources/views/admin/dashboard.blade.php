@extends('layouts.admin')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Sales</p>
            <h3 class="text-2xl font-bold text-gray-900">${{ number_format(\App\Models\Order::sum('total_price'), 2) }}</h3>
        </div>
        <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Orders</p>
            <h3 class="text-2xl font-bold text-gray-900">{{ \App\Models\Order::count() }}</h3>
        </div>
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Products</p>
            <h3 class="text-2xl font-bold text-gray-900">{{ \App\Models\Product::count() }}</h3>
        </div>
        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Users</p>
            <h3 class="text-2xl font-bold text-gray-900">{{ \App\Models\User::count() }}</h3>
        </div>
        <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h3 class="font-semibold text-gray-800">Recent Orders</h3>
        <a href="{{ route('admin.orders.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">View All</a>
    </div>
    <div class="p-0">
        <table class="w-full text-left">
            <thead>
                <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Customer</th>
                    <th class="px-6 py-4">Date</th>
                    <th class="px-6 py-4">Amount</th>
                    <th class="px-6 py-4">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach(\App\Models\Order::with('user')->latest()->take(5)->get() as $order)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">#{{ $order->id }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $order->user->name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $order->created_at->diffForHumans() }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">${{ number_format($order->total_price, 2) }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 capitalize">{{ $order->status }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
