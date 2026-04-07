@extends('layouts.admin')
@section('header', 'Add Category')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 max-w-3xl">
    <div class="p-8">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                    <input type="text" name="name" class="w-full rounded-lg border-gray-300 border p-3 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-700" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4" class="w-full rounded-lg border-gray-300 border p-3 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-gray-700"></textarea>
                </div>
                
                <div class="pt-4 flex justify-end gap-3">
                    <a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 text-gray-600 font-medium hover:text-gray-900">Cancel</a>
                    <button type="submit" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-indigo-700 transition">Save Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
