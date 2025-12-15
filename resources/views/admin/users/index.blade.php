@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10">

    <h1 class="text-3xl font-bold mb-12 text-gray-800">
        {{ __('user.management') }}
    </h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- ADMIN ACCOUNTS --}}
    <div class="flex justify-between items-center mb-3 mt-6 border-b pb-2">
        <h2 class="text-2xl font-semibold text-gray-700">
            {{ __('user.admin_accounts') }}
        </h2>

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
                    <th class="py-2 px-4">#</th>
                    <th class="py-2 px-4">{{ __('user.name') }}</th>
                    <th class="py-2 px-4">{{ __('user.email') }}</th>
                    <th class="py-2 px-4">{{ __('user.role') }}</th>
                    <th class="py-2 px-4">{{ __('user.registered') }}</th>
                    <th class="py-2 px-4">{{ __('user.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users->where('role', 'admin') as $index => $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4">{{ __('role.admin') }}</td>
                        <td class="py-2 px-4">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="py-2 px-4">
                            @if(auth()->id() !== $user->id)
                                <button
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                                    onclick="openModal({{ $user->id }}, '{{ $user->name }}', '{{ __('role.admin') }}')">
                                    {{ __('button.delete') }}
                                </button>
                            @else
                                <button disabled
                                    class="bg-gray-400 text-white px-3 py-1 rounded cursor-not-allowed">
                                    {{ __('button.delete') }}
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- USER ACCOUNTS --}}
    <h2 class="text-2xl font-semibold text-gray-700 mb-3 mt-6 border-b pb-2">
        {{ __('user.user_accounts') }}
    </h2>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4">#</th>
                    <th class="py-2 px-4">{{ __('user.name') }}</th>
                    <th class="py-2 px-4">{{ __('user.email') }}</th>
                    <th class="py-2 px-4">{{ __('user.role') }}</th>
                    <th class="py-2 px-4">{{ __('user.registered') }}</th>
                    <th class="py-2 px-4">{{ __('user.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users->where('role', 'user') as $index => $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4">{{ __('role.user') }}</td>
                        <td class="py-2 px-4">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="py-2 px-4">
                            @if(auth()->id() !== $user->id)
                                <button
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                                    onclick="openModal({{ $user->id }}, '{{ $user->name }}', '{{ __('role.user') }}')">
                                    {{ __('button.delete') }}
                                </button>
                            @else
                                <button disabled
                                    class="bg-gray-400 text-white px-3 py-1 rounded cursor-not-allowed">
                                    {{ __('button.delete') }}
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- DELETE MODAL --}}
<div id="deleteModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-2xl max-w-sm w-full">
        <h2 class="text-xl font-semibold mb-4">
            {{ __('modal.delete_title') }}
        </h2>

        <p class="text-gray-600 mb-6" id="modalText"></p>

        <div class="flex justify-end space-x-3">
            <button onclick="closeModal()"
                class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                {{ __('button.cancel') }}
            </button>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    {{ __('button.delete') }}
                </button>
            </form>
        </div>
    </div>
</div>

{{-- ADD ADMIN MODAL --}}
<div id="addAdminModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-2xl w-full max-w-md">
        <h2 class="text-xl font-semibold mb-4">
            {{ __('modal.add_admin_title') }}
        </h2>

        <form method="POST" action="{{ route('admin.users.store') }}" id="addAdminForm">
            @csrf
            <input type="hidden" name="role" value="admin">

            <div class="mb-4">
                <label class="block mb-1">{{ __('form.name') }}</label>
                <input type="text" name="name" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1">{{ __('form.email') }}</label>
                <input type="email" name="email" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1">{{ __('form.password') }}</label>
                <input type="password" name="password" class="w-full border rounded p-2">
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" onclick="closeAddAdminModal()"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                    {{ __('button.cancel') }}
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-slate-800 text-white rounded hover:bg-slate-900 transition">
                    {{ __('button.add') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const hasErrors = @json($errors->any());
</script>
@endsection
