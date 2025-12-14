@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">

        <h2 class="text-2xl font-bold text-center mb-6">
            {{ __('sign_in') }}
        </h2>

        @if (session('status'))
            <div class="mb-4 text-sm text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('email') }}
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500"
                >
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('password') }}
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

            <div class="flex items-center">
                <input type="checkbox" name="remember" class="mr-2">
                <span class="text-sm text-gray-600">{{ __('remember_me') }}</span>
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-slate-800 text-white py-2 rounded hover:bg-slate-900 transition">
                    {{ __('sign_in') }}
                </button>
            </div>
        </form>

        <div class="flex flex-col items-center justify-center mt-6 space-y-2">
            <div>
                <span class="text-sm text-gray-600">
                    {{ __('dont_have_account') }}
                </span>
                <a href="{{ route('register') }}"
                   class="ml-2 text-sm text-indigo-600 hover:text-indigo-900 font-semibold">
                    {{ __('register_here') }}
                </a>
            </div>

            <a href="{{ url('/') }}"
               class="text-sm text-gray-600 hover:text-gray-900 font-semibold">
                {{ __('back_to_home') }}
            </a>
        </div>
    </div>
</div>
@endsection
