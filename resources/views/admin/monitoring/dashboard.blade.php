<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Monitoring Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500">Total Users</div>
                        <div class="mt-2 text-3xl font-bold text-gray-900">{{ $totalUsers }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500">Total Books</div>
                        <div class="mt-2 text-3xl font-bold text-gray-900">{{ $totalBooks }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500">Total Activities</div>
                        <div class="mt-2 text-3xl font-bold text-gray-900">{{ $totalActivities }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500">Active Users Today</div>
                        <div class="mt-2 text-3xl font-bold text-gray-900">{{ $activeUsersToday }}</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Active Users</h3>
                        <div class="space-y-3">
                            @forelse($topActiveUsers as $activity)
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                            <span class="text-gray-600 font-medium">
                                                {{ substr($activity->user->name ?? 'Unknown', 0, 1) }}
                                            </span>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">{{ $activity->user->name ?? 'Unknown User' }}</div>
                                            <div class="text-sm text-gray-500">{{ $activity->user->email ?? 'N/A' }}</div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-sm font-semibold text-gray-900">{{ $activity->activity_count }}</div>
                                        <div class="text-xs text-gray-500">activities</div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">No activity data available</p>
                            @endforelse
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.monitoring.users') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                                View All Users →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Activity by Type</h3>
                        <div class="space-y-3">
                            @forelse($activityByAction as $activity)
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <div class="font-medium text-gray-700">{{ ucfirst(str_replace('_', ' ', $activity->action)) }}</div>
                                    <div class="flex items-center">
                                        <span class="text-sm font-semibold text-gray-900 mr-2">{{ $activity->count }}</span>
                                        <div class="w-24 bg-gray-200 rounded-full h-2">
                                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ min(($activity->count / $totalActivities) * 100, 100) }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">No activity data available</p>
                            @endforelse
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.monitoring.activities') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                                View All Activities →
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activities</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP Address</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($recentActivities as $activity)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $activity->user->name ?? 'Unknown' }}</div>
                                            <div class="text-sm text-gray-500">{{ $activity->user->email ?? 'N/A' }}</div>
                                        </td>
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
                                            {{ $activity->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                            No activities found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
