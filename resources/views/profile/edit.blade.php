@extends('layouts.app')

@section('title', __('profile'))

@section('content')
<div class="flex justify-center items-center bg-gray-100">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">{{ __('edit_profile') }}</h2>

        @if (session('status') === 'profile-updated')
            <div class="text-green-600 text-center mb-4 font-medium">
                {{ __('profile_updated_success') }}
            </div>
        @elseif (session('status') === 'no-changes')
            <div class="text-red-600 text-center mb-4 font-medium">
                {{ __('no_changes_made') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" novalidate>
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label class="block font-semibold mb-1">{{ __('name') }}</label>
                <input
                    type="text"
                    name="name"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500"
                    placeholder="{{ auth()->user()->name ?? __('enter_full_name') }}"
                    value="{{ old('name') }}"
                >
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">{{ __('email') }}</label>
                <input
                    type="email"
                    name="email"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500"
                    placeholder="{{ auth()->user()->email ?? __('enter_email') }}"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="px-6 py-2 mt-5 bg-slate-800 text-white rounded hover:bg-slate-700 transition duration-200">
                    {{ __('save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
