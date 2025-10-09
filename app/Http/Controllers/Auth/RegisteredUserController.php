<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'unique:users,name',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'regex:/@gmail\.com$/',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:5',
                'confirmed',
            ],
        ], [
            'name.required' => 'The name field is required.',
            'name.min' => 'The name must be at least 3 characters.',
            'name.unique' => 'This name is already taken.',

            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.regex' => 'The email must end with @gmail.com.',
            'email.unique' => 'This email is already registered.',

            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 5 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email), 
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
