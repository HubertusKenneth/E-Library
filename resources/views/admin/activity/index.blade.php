@extends('layouts.app') 

@section('content')
    <div class="container" style="padding-top: 20px;">
        
        <h2 style="
            font-size: 2.2rem; 
            font-weight: bold; 
            margin-bottom: 5px; 
        ">Authentication Activity Log</h2>
        
        
        @if ($activityLogs->isEmpty()) 
            <div class="alert alert-warning">
                No authentication activity logs found in laravel.log file.
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Action</th>
                        <th>Method</th>
                        <th>User ID</th>
                        <th>IP Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activityLogs as $log) 
                        <tr>
                            <td>{{ $log['time'] }}</td>
                            <td>
                                @if ($log['action'] == 'Logout')
                                    <span class="badge bg-success">Logout</span>
                                @elseif (str_contains($log['action'], 'Attempt'))
                                    <span class="badge bg-warning">{{ $log['action'] }}</span>
                                @else
                                    <span class="badge bg-info">{{ $log['action'] }}</span>
                                @endif
                            </td>
                            <td>{{ $log['method'] }}</td>
                            <td>
                                @if ($log['user_id'] == 'Guest')
                                    <span class="text-muted">{{ $log['user_id'] }}</span>
                                @else
                                    <strong>{{ $log['user_id'] }}</strong>
                                @endif
                            </td>
                            <td>{{ $log['ip'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-4">
                {{ $activityLogs->links() }}
            </div>

        @endif
    </div>
@endsection