<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth('admin')->check()) {
            return redirect()->route('admin.login');
        }
        $user = auth('admin')->user();
        if ($user->guard !== 'admin' || !$user->is_active) {
            auth('admin')->logout();
            return redirect()->route('admin.login')->withErrors(['email' => 'Access denied.']);
        }
        return $next($request);
    }
}
