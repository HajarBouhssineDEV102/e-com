@extends('layouts.admin')
@section('header', 'Users')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-lg font-medium text-gray-900">Manage Users</h3>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Email</th>
                <th class="px-6 py-4">Role</th>
                <th class="px-6 py-4">Joined</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($users as $user)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                <td class="px-6 py-4">
                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium {{ $user->is_admin ? 'bg-indigo-50 text-indigo-700' : 'bg-gray-100 text-gray-700' }}">
                        {{ $user->is_admin ? 'Admin' : 'Customer' }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4 text-right">
                    @if(Auth::id() !== $user->id)
                        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="inline-block mr-3">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_admin" value="{{ $user->is_admin ? '' : '1' }}">
                            @if($user->is_admin)
                                <button class="text-amber-600 hover:text-amber-800 text-sm font-medium">Demote</button>
                            @else
                                <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">Make Admin</button>
                            @endif
                        </form>
                        
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 text-sm font-medium">Delete</button>
                        </form>
                    @else
                        <span class="text-sm text-gray-400 italic">You</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $users->links() }}
    </div>
</div>
@endsection
