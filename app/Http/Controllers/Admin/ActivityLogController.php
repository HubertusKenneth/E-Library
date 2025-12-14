<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logPath = storage_path('logs/laravel.log');
        $activityLogs = [];

        if (File::exists($logPath)) {
            $logContent = File::get($logPath);
            
            $pattern = '/^\[(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})\] local\.INFO: Incoming Request (.*)$/m';            
            if (preg_match_all($pattern, $logContent, $matches, PREG_SET_ORDER)) {
                
                foreach ($matches as $match) {
                    $timestamp = $match[1];
                    $jsonContext = json_decode($match[2], true);
                    
                    if (str_contains($jsonContext['url'], '/login') || str_contains($jsonContext['url'], '/logout') || str_contains($jsonContext['url'], '/register')) {
                        
                        $action = match ($jsonContext['url']) {
                            default => 'Other Auth Action',
                            url('/login') => 'Login Attempt',
                            url('/logout') => 'Logout',
                            url('/register') => 'Register Attempt',
                        };

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

        return view('admin.activity.index', compact('activityLogs'));
    }
}