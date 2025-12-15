<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\LengthAwarePaginator;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $logPath = storage_path('logs/laravel.log');
        $activityLogs = [];

        if (File::exists($logPath)) {
            $logContent = File::get($logPath);
            $pattern = '/^\[(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})\] local\.INFO: Incoming Request (.*)$/m';
            
            if (preg_match_all($pattern, $logContent, $matches, PREG_SET_ORDER)) {
                
                foreach ($matches as $match) {
                    $timestamp = $match[1];
                    $jsonString = trim($match[2]);
                    $jsonContext = json_decode($jsonString, true);
                    
                    if ($jsonContext === null) {
                        continue; 
                    }

                    if (str_contains($jsonContext['url'], '/login') || str_contains($jsonContext['url'], '/logout') || str_contains($jsonContext['url'], '/register')) {
                        
                        $url = $jsonContext['url'];

                        $action = 'Other Auth Action';
                        if (str_contains($url, '/logout')) {
                            $action = 'Logout';
                        } elseif (str_contains($url, '/login')) {
                            $action = 'Login Attempt';
                        } elseif (str_contains($url, '/register')) {
                            $action = 'Register Attempt';
                        }

                        $activityLogs[] = [
                            'time' => $timestamp,
                            'action' => $action,
                            'method' => $jsonContext['method'],
                            'user_id' => $jsonContext['user'],
                            'ip' => $jsonContext['ip'],
                        ];
                    }
                }
            }
        }
        
        $activityLogs = array_reverse($activityLogs);

        $perPage = 20; 
        $currentPage = LengthAwarePaginator::resolveCurrentPage() ?? 1;
        $total = count($activityLogs);

        $currentPageLogs = array_slice($activityLogs, ($currentPage - 1) * $perPage, $perPage);

        $paginator = new LengthAwarePaginator($currentPageLogs, $total, $perPage, $currentPage, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        return view('admin.activity.index', [
            'activityLogs' => $paginator, 
        ]);
    }
}