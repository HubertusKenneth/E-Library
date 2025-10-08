<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserActivity;

class LogUserActivity
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (auth()->check() && $request->method() !== 'GET') {
            $this->logActivity($request);
        }

        return $response;
    }

    private function logActivity(Request $request): void
    {
        $action = $this->determineAction($request);

        if ($action) {
            UserActivity::create([
                'user_id' => auth()->id(),
                'action' => $action,
                'description' => $this->generateDescription($request, $action),
                'model_type' => $this->getModelType($request),
                'model_id' => $this->getModelId($request),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'properties' => $this->getProperties($request),
            ]);
        }
    }

    private function determineAction(Request $request): ?string
    {
        $method = $request->method();
        $path = $request->path();

        if (str_contains($path, 'favorite')) {
            return 'favorite_toggle';
        }

        if (str_contains($path, 'login')) {
            return 'login';
        }

        if (str_contains($path, 'logout')) {
            return 'logout';
        }

        if (str_contains($path, 'register')) {
            return 'register';
        }

        if (str_contains($path, 'profile')) {
            return match($method) {
                'PATCH', 'PUT' => 'profile_update',
                'DELETE' => 'profile_delete',
                default => null,
            };
        }

        if (str_contains($path, 'admin/books')) {
            return match($method) {
                'POST' => 'book_create',
                'PUT', 'PATCH' => 'book_update',
                'DELETE' => 'book_delete',
                default => null,
            };
        }

        return null;
    }

    private function generateDescription(Request $request, string $action): string
    {
        return match($action) {
            'favorite_toggle' => 'Toggled favorite for book',
            'login' => 'User logged in',
            'logout' => 'User logged out',
            'register' => 'New user registered',
            'profile_update' => 'Updated profile information',
            'profile_delete' => 'Deleted account',
            'book_create' => 'Created new book',
            'book_update' => 'Updated book information',
            'book_delete' => 'Deleted book',
            default => 'Performed action: ' . $action,
        };
    }

    private function getModelType(Request $request): ?string
    {
        if (str_contains($request->path(), 'books')) {
            return 'App\Models\Book';
        }

        if (str_contains($request->path(), 'profile')) {
            return 'App\Models\User';
        }

        return null;
    }

    private function getModelId(Request $request): ?int
    {
        $segments = $request->segments();

        foreach ($segments as $index => $segment) {
            if (is_numeric($segment)) {
                return (int) $segment;
            }
        }

        if (str_contains($request->path(), 'profile')) {
            return auth()->id();
        }

        return null;
    }

    private function getProperties(Request $request): array
    {
        $properties = [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
        ];

        if ($request->has('_method')) {
            $properties['actual_method'] = $request->input('_method');
        }

        return $properties;
    }
}
