<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalBooks = Book::count();
        $totalActivities = UserActivity::count();
        $activeUsersToday = UserActivity::whereDate('created_at', today())
            ->distinct('user_id')
            ->count('user_id');

        $recentActivities = UserActivity::with('user')
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        $topActiveUsers = UserActivity::select('user_id', DB::raw('count(*) as activity_count'))
            ->groupBy('user_id')
            ->orderBy('activity_count', 'desc')
            ->take(10)
            ->with('user')
            ->get();

        $activityByAction = UserActivity::select('action', DB::raw('count(*) as count'))
            ->groupBy('action')
            ->orderBy('count', 'desc')
            ->get();

        return view('admin.monitoring.dashboard', compact(
            'totalUsers',
            'totalBooks',
            'totalActivities',
            'activeUsersToday',
            'recentActivities',
            'topActiveUsers',
            'activityByAction'
        ));
    }

    public function users(Request $request)
    {
        $query = User::withCount('favorites');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.monitoring.users', compact('users'));
    }

    public function userDetail($id)
    {
        $user = User::with('favorites')->findOrFail($id);

        $activities = UserActivity::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $activityStats = [
            'total' => UserActivity::where('user_id', $id)->count(),
            'today' => UserActivity::where('user_id', $id)->whereDate('created_at', today())->count(),
            'this_week' => UserActivity::where('user_id', $id)->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month' => UserActivity::where('user_id', $id)->whereMonth('created_at', now()->month)->count(),
        ];

        return view('admin.monitoring.user-detail', compact('user', 'activities', 'activityStats'));
    }

    public function activities(Request $request)
    {
        $query = UserActivity::with('user');

        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $activities = $query->orderBy('created_at', 'desc')->paginate(50);

        $actions = UserActivity::select('action')->distinct()->pluck('action');

        return view('admin.monitoring.activities', compact('activities', 'actions'));
    }
}
