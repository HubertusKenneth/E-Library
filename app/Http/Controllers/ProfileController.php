<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $user = $request->user();
    //     $validated = $request->validated();

    //     if (isset($validated['email']) && $validated['email'] !== $user->email) {
    //         $user->email_verified_at = null;
    //     }

    //     $user->fill([
    //         'name'  => $validated['name']  ?? $user->name,
    //         'email' => $validated['email'] ?? $user->email,
    //     ])->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }
    public function update(Request $request)
{
    $user = $request->user();

    // Validate inputs
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
    ]);

    // Check if data has changed
    if (
        $validated['name'] === $user->name &&
        $validated['email'] === $user->email
    ) {
        return back()->with('status', 'no-changes');
    }

    // If changed, update normally
    $user->fill($validated)->save();

    return back()->with('status', 'profile-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
