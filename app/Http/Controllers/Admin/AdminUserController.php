<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $user->update(['is_admin' => $request->has('is_admin')]);
        return redirect()->route('admin.users.index')->with('success', 'User updated');
    }
    
    public function destroy(User $user)
    {
        if ($user->id !== auth()->id()) {
            $user->delete();
        }
        return redirect()->route('admin.users.index')->with('success', 'User deleted');
    }
}
