<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Details: {{ $user->name }}
            </h2>
            <a href="{{ route('admin.monitoring.users') }}" class="text-sm text-blue-600 hover:text-blue-800">
                ← Back to Users
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">User Information</h3>
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->email }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Role</dt>
                                <dd class="mt-1">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Joined</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('M d, Y H:i') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Favorite Books</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->favorites->count() }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Activity Statistics</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-50 rounded-lg p-4">
                                <div class="text-sm font-medium text-blue-600">Total Activities</div>
                                <div class="mt-2 text-2xl font-bold text-blue-900">{{ $activityStats['total'] }}</div>
                            </div>
                            <div class="bg-green-50 rounded-lg p-4">
                                <div class="text-sm font-medium text-green-600">Today</div>
                                <div class="mt-2 text-2xl font-bold text-green-900">{{ $activityStats['today'] }}</div>
                            </div>
                            <div class="bg-yellow-50 rounded-lg p-4">
                                <div class="text-sm font-medium text-yellow-600">This Week</div>
                                <div class="mt-2 text-2xl font-bold text-yellow-900">{{ $activityStats['this_week'] }}</div>
                            </div>
                            <div class="bg-red-50 rounded-lg p-4">
                                <div class="text-sm font-medium text-red-600">This Month</div>
                                <div class="mt-2 text-2xl font-bold text-red-900">{{ $activityStats['this_month'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($user->favorites->count() > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Favorite Books</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($user->favorites as $book)
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                                    <h4 class="font-medium text-gray-900">{{ $book->title }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $book->author }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $book->genre }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Activity Log</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP Address</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($activities as $activity)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                {{ $activity->action }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">{{ $activity->description ?? '-' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $activity->ip_address ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $activity->created_at->format('M d, Y H:i:s') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                            No activities found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $activities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
