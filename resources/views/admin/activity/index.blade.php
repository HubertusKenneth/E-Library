@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-3">
        {{ __('activity.title') }}
    </h2>

    @if ($activityLogs->isEmpty())
        <div class="alert alert-warning">
            {{ __('activity.empty') }}
        </div>
    @else

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('activity.time') }}</th>
                        <th>{{ __('activity.action') }}</th>
                        <th>{{ __('activity.method') }}</th>
                        <th>{{ __('activity.user_id') }}</th>
                        <th>{{ __('activity.ip') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activityLogs as $log)
                        <tr>
                            <td>{{ $log['time'] }}</td>
                            <td>
                                @if ($log['action'] === 'Logout')
                                    <span class="badge bg-success">
                                        {{ __('activity.logout') }}
                                    </span>
                                @elseif (str_contains($log['action'], 'Attempt'))
                                    <span class="badge bg-warning text-dark">
                                        {{ __('activity.' . Str::snake(strtolower($log['action']))) }}
                                    </span>
                                @else
                                    <span class="badge bg-info">
                                        {{ $log['action'] }}
                                    </span>
                                @endif
                            </td>
                            <td>{{ $log['method'] }}</td>
                            <td>
                                @if ($log['user_id'] === 'Guest')
                                    <span class="text-muted">
                                        {{ __('activity.guest') }}
                                    </span>
                                @else
                                    <strong>{{ $log['user_id'] }}</strong>
                                @endif
                            </td>
                            <td>{{ $log['ip'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            

            <div>
                {{ $activityLogs->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        </div>

    @endif
</div>
@endsection
