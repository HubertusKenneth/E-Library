<x-guest-layout>
    <div class="flex justify-center mt-6">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                          :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                          :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

<!-- Register Button -->
<div class="flex justify-center mt-6">
    <x-primary-button>
        {{ __('Register') }}
    </x-primary-button>
</div>

<!-- Already Registered -->
<div class="flex justify-center mt-2"> <!-- mt-2 supaya lebih dekat ke tombol -->
    <a href="{{ route('login') }}"
       class="text-sm text-indigo-600 hover:text-indigo-900 font-semibold underline">
        Already registered?
    </a>
</div>

        <!-- Back to Home -->
        <div class="flex justify-center mt-6">
            <a href="{{ url('/') }}"
               class="text-sm text-gray-600 hover:text-gray-900 font-semibold">
                Back to Home
            </a>
        </div>
    </form>
</x-guest-layout>
