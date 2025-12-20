<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password ?? 'admin123');
        $user->role = 'admin';
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'New admin added successfully.');
    }


    public function destroy($id)
    {
        $currentUser = auth()->user();
        $userToDelete = User::findOrFail($id);

        // 1. Prevent self-deletion
        if ($currentUser->id == $id) {
            return redirect()->route('admin.users.index')->with('error', 'You cannot delete your own account.');
        }

        // 2. Logic: If the user being deleted is an Admin, only a Super Admin can do it.
        if ($userToDelete->role === 'admin' && !$currentUser->isSuperAdmin()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Only Super Admins can delete Admin accounts.');
        }

        // 3. Prevent anyone from deleting a Super Admin (optional safety)
        if ($userToDelete->role === 'super_admin') {
            return redirect()->route('admin.users.index')
                ->with('error', 'Super Admin accounts cannot be deleted.');
        }

        $userToDelete->delete();

        return redirect()->route('admin.users.index')
            ->with('success', ucfirst($userToDelete->role) . ' deleted successfully.');
    }
}
