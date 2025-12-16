<x-guest-layout>
    <div class="flex justify-center mt-6">
        <img class="w-20 h-20 fill-current text-gray-500" src="{{ asset('storage/ReadSpaceLogo.png') }}"
        alt="ReadSpace Logo"
        class="h-10 w-10 object-contain">
    </div>

    <h2 class="text-2xl font-bold text-center mb-6">
        {{ __('register') }}
    </h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('password')" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />
        </div>

        <div class="flex justify-center mt-6">
            <x-primary-button>
                {{ __('register') }}
            </x-primary-button>
        </div>
    </form>

    <div class="flex flex-col items-center justify-center mt-6 space-y-2">
        <div>
            <span class="text-sm text-gray-600">
                {{ __('already_registered') }}
            </span>
            <a href="{{ route('login') }}"
               class="ml-2 text-sm text-indigo-600 hover:text-indigo-900 font-semibold">
                {{ __('sign_in') }}
            </a>
        </div>

        <a href="{{ url('/') }}"
           class="text-sm text-gray-600 hover:text-gray-900 font-semibold">
            {{ __('back_to_home') }}
        </a>
    </div>
</x-guest-layout>
