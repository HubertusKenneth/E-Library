<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Create session data for authenticated user
     */
    public function createSession(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $request->session()->put('user_name', auth()->user()->name);
        $request->session()->put('user_email', auth()->user()->email);
        $request->session()->put('user_role', auth()->user()->role ?? 'user');

        return response()->json([
            'message' => 'User session created successfully',
            'session_data' => [
                'name' => session('user_name'),
                'email' => session('user_email'),
                'role' => session('user_role'),
            ]
        ]);
    }

    public function readSession(Request $request)
    {
        return response()->json([
            'name' => $request->session()->get('user_name'),
            'email' => $request->session()->get('user_email'),
            'role' => $request->session()->get('user_role'),
        ]);
    }

    public function deleteSession(Request $request)
    {
        $request->session()->forget([
            'user_name',
            'user_email',
            'user_role'
        ]);

        return response()->json([
            'message' => 'User session deleted successfully'
        ]);
    }
    
    public function flashSession(Request $request)
    {
        $request->session()->flash(
            'success',
            'The operation was completed successfully!'
        );

        return redirect()->route('books.index');
    }
}
