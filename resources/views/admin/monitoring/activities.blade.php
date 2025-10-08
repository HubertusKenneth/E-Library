<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Activity Logs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <form method="GET" action="{{ route('admin.monitoring.activities') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label for="action" class="block text-sm font-medium text-gray-700 mb-1">Action</label>
                                <select
                                    id="action"
                                    name="action"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >
                                    <option value="">All Actions</option>
                                    @foreach($actions as $action)
                                        <option value="{{ $action }}" {{ request('action') == $action ? 'selected' : '' }}>
                                            {{ ucfirst(str_replace('_', ' ', $action)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                                <input
                                    type="date"
                                    id="date_from"
                                    name="date_from"
                                    value="{{ request('date_from') }}"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >
                            </div>

                            <div>
                                <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                                <input
                                    type="date"
                                    id="date_to"
                                    name="date_to"
                                    value="{{ request('date_to') }}"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >
                            </div>

                            <div class="flex items-end gap-2">
                                <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    Filter
                                </button>
                                @if(request()->hasAny(['action', 'date_from', 'date_to']))
                                    <a href="{{ route('admin.monitoring.activities') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                                        Clear
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IP Address</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($activities as $activity)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            #{{ $activity->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($activity->user)
                                                <div class="text-sm font-medium text-gray-900">{{ $activity->user->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $activity->user->email }}</div>
                                            @else
                                                <span class="text-sm text-gray-400">Unknown User</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                {{ $activity->action }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">{{ $activity->description ?? '-' }}</div>
                                            @if($activity->model_type)
                                                <div class="text-xs text-gray-500 mt-1">
                                                    {{ class_basename($activity->model_type) }} #{{ $activity->model_id }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $activity->ip_address ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $activity->created_at->format('M d, Y H:i:s') }}
                                            <div class="text-xs text-gray-400">{{ $activity->created_at->diffForHumans() }}</div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                            No activities found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $activities->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
