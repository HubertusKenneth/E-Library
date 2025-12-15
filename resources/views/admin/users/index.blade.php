@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-12 text-gray-800">{{ __('user_management') }}</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-3 mt-6 border-b pb-2">
        <h2 class="text-2xl font-semibold text-gray-700">{{ __('admin_accounts') }}</h2>

        <button onclick="openAddAdminModal()"
            class="bg-slate-800 text-white p-2 rounded-full hover:bg-slate-900 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 4v16m8-8H4" />
            </svg>
        </button>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden mb-10">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left w-1/12">#</th>
                    <th class="py-2 px-4 border-b text-left w-2/12">{{ __('name') }}</th>
                    <th class="py-2 px-4 border-b text-left w-3/12">{{ __('email') }}</th>
                    <th class="py-2 px-4 border-b text-left w-2/12">{{ __('role') }}</th>
                    <th class="py-2 px-4 border-b text-left w-2/12">{{ __('registered') }}</th>
                    <th class="py-2 px-4 border-b text-left w-2/12">{{ __('action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users->where('role', 'admin') as $index => $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4 capitalize">{{ $user->role }}</td>
                        <td class="py-2 px-4">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="py-2 px-4">
                            @if (auth()->id() !== $user->id)
                                <button
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                                    onclick="openModal({{ $user->id }}, '{{ $user->name }}')">
                                    {{ __('delete') }}
                                </button>
                            @else
                                <button class="bg-gray-400 text-white px-3 py-1 rounded cursor-not-allowed" disabled>
                                    {{ __('delete') }}
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h2 class="text-2xl font-semibold text-gray-700 mb-3 mt-6 border-b pb-2">{{ __('user_accounts') }}</h2>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left w-1/12">#</th>
                    <th class="py-2 px-4 border-b text-left w-2/12">{{ __('name') }}</th>
                    <th class="py-2 px-4 border-b text-left w-3/12">{{ __('email') }}</th>
                    <th class="py-2 px-4 border-b text-left w-2/12">{{ __('role') }}</th>
                    <th class="py-2 px-4 border-b text-left w-2/12">{{ __('registered') }}</th>
                    <th class="py-2 px-4 border-b text-left w-2/12">{{ __('action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users->where('role', 'user') as $index => $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4 capitalize">{{ $user->role }}</td>
                        <td class="py-2 px-4">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="py-2 px-4">
                            @if (auth()->id() !== $user->id)
                                <button
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                                    onclick="openModal({{ $user->id }}, '{{ $user->name }}')">
                                    {{ __('delete') }}
                                </button>
                            @else
                                <button class="bg-gray-400 text-white px-3 py-1 rounded cursor-not-allowed" disabled>
                                    {{ __('delete') }}
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">{{ __('delete_confirmation') }}</h2>
        <p class="text-gray-600 mb-6" id="modalText"></p>

        <div class="flex justify-end space-x-3">
            <button onclick="closeModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 transition">
                {{ __('cancel') }}
            </button>

            <form id="deleteForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 transition">
                    {{ __('delete') }}
                </button>
            </form>
        </div>
    </div>
</div>

<div id="addAdminModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">{{ __('add_new_admin') }}</h2>

        <form method="POST" action="{{ route('admin.users.store') }}" novalidate>
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 mb-1">{{ __('name') }}</label>
                <input type="text" id="name" name="name"
                    class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-1">{{ __('email') }}</label>
                <input type="email" id="email" name="email"
                    class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 mb-1">{{ __('password_optional') }}</label>
                <input type="password" id="password" name="password"
                    class="w-full border-gray-300 rounded p-2 focus:ring focus:ring-blue-200">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-1">
                    {!! __('default_password_note', ['password' => '<strong>admin123</strong>']) !!}
                </p>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" onclick="closeAddAdminModal()"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">{{ __('cancel') }}</button>
                <button type="submit"
                    class="px-4 py-2 bg-slate-800 text-white rounded hover:bg-slate-900 transition">{{ __('add') }}</button>
            </div>
        </form>
    </div>
</div>

<script>
    const hasErrors = @json($errors->any());
    window.i18n = {
        deleteUserConfirm: @json(__('confirm_delete_user', ['name' => '__NAME__']))
    };
</script>
@endsection
