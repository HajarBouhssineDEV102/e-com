@extends('layouts.admin')
@section('header', 'Orders')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-lg font-medium text-gray-900">Manage Orders</h3>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">
                <th class="px-6 py-4">Order ID</th>
                <th class="px-6 py-4">Customer</th>
                <th class="px-6 py-4">Date</th>
                <th class="px-6 py-4">Total</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($orders as $order)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium text-gray-900">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                <td class="px-6 py-4 text-gray-600">
                    {{ $order->user->name ?? 'Deleted User' }}
                    <span class="block text-xs text-gray-400">{{ $order->user->email ?? '' }}</span>
                </td>
                <td class="px-6 py-4 text-gray-500">{{ $order->created_at->format('M d, Y H:i') }}</td>
                <td class="px-6 py-4 font-medium text-gray-900">${{ number_format($order->total_price, 2) }}</td>
                <td class="px-6 py-4">
                    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="inline-block">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()" class="text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-1 pl-2 pr-6 {{ $order->status == 'pending' ? 'bg-amber-50 text-amber-800' : '' }} {{ $order->status == 'paid' ? 'bg-blue-50 text-blue-800' : '' }} {{ $order->status == 'shipped' ? 'bg-indigo-50 text-indigo-800' : '' }} {{ $order->status == 'delivered' ? 'bg-emerald-50 text-emerald-800' : '' }}">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        </select>
                    </form>
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('admin.orders.show', $order) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $orders->links() }}
    </div>
</div>
@endsection
