@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">

        <h2 class="text-2xl font-bold text-center mb-6">
            {{ __('ui.register_here') }}
        </h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('ui.name') }}
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500"
                >
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('ui.email') }}
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500"
                >
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    required
                    class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500"
                >
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Confirm Password
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500"
                >
            </div>

            {{-- Submit --}}
            <div>
                <button
                    type="submit"
                    class="w-full bg-slate-800 text-white py-2 rounded hover:bg-slate-900 transition"
                >
                    {{ __('ui.add') }}
                </button>
            </div>
        </form>

        {{-- Extra Links --}}
        <div class="flex justify-center mt-4">
            <a href="{{ route('login') }}"
               class="text-sm text-indigo-600 hover:text-indigo-900 font-semibold underline">
                {{ __('ui.already_registered') }}
            </a>
        </div>

        <div class="flex justify-center mt-6">
            <a href="{{ url('/') }}"
               class="text-sm text-gray-600 hover:text-gray-900 font-semibold">
                {{ __('ui.back_to_home') }}
            </a>
        </div>
    </div>
</div>
@endsection
