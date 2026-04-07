@extends('layouts.admin')
@section('header', 'Categories')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-lg font-medium text-gray-900">Manage Categories</h3>
    <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">Add New Category</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">
                <th class="px-6 py-4">ID</th>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Description</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($categories as $category)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-gray-500">#{{ $category->id }}</td>
                <td class="px-6 py-4 font-medium text-gray-900">{{ $category->name }}</td>
                <td class="px-6 py-4 text-gray-600">{{ Str::limit($category->description, 50) }}</td>
                <td class="px-6 py-4 text-right">
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
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
        {{ $categories->links() }}
    </div>
</div>
@endsection
