@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="flex justify-center items-center bg-gray-100">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Edit Profile</h2>

        @if (session('status') === 'profile-updated')
            <div class="text-green-600 text-center mb-4 font-medium">
                Profile updated successfully!
            </div>
        @elseif (session('status') === 'no-changes')
            <div class="text-red-600 text-center mb-4 font-medium">
                No changes were made.
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH') 

            <div class="mb-4">
                <label class="block font-semibold mb-1">Name</label>
                <input 
                    type="text" 
                    name="name" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500" 
                    placeholder="{{ auth()->user()->name ?? 'Enter your full name' }}"
                    value="{{ old('name') }}"
                >
                @error('name') 
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div> 
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500" 
                    placeholder="{{ auth()->user()->email ?? 'Enter your email address' }}"
                    value="{{ old('email') }}"
                >
                @error('email') 
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div> 
                @enderror
            </div>

            <div class="flex justify-center">
                <button 
                    type="submit" 
                    class="px-6 py-2 mt-5 bg-slate-800 text-white rounded hover:bg-slate-700 transition duration-200"
                >
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
