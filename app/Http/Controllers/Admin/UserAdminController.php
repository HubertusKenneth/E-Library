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
        if (auth()->id() == $id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'You cannot delete your own account.');
        }

        $user = User::findOrFail($id);
        $role = ucfirst($user->role); 
        
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', $role . ' deleted successfully.');
    }
}
