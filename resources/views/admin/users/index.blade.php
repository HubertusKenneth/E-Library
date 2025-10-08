@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5 text-gray-800">User Management</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left">#</th>
                    <th class="py-2 px-4 border-b text-left">Name</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Role</th>
                    <th class="py-2 px-4 border-b text-left">Registered</th>
                    <th class="py-2 px-4 border-b text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4 capitalize">{{ $user->role }}</td>
                        <td class="py-2 px-4">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="py-2 px-4">
                            <button 
                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                                onclick="openModal({{ $user->id }}, '{{ $user->name }}')">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- ✅ Modal Konfirmasi --}}
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Delete Confirmation</h2>
        <p class="text-gray-600 mb-6" id="modalText"></p>

        <div class="flex justify-end space-x-3">
            <button onclick="closeModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 transition">
                Cancel
            </button>

            <form id="deleteForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

{{-- ✅ Script Modal --}}
<script>
    function openModal(userId, userName) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const modalText = document.getElementById('modalText');

        form.action = `/admin/users/${userId}`;
        modalText.textContent = `Are you sure you want to delete user "${userName}"?`;

        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endsection
