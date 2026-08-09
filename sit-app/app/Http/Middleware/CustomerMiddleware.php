<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth('customer')->check()) {
            return redirect()->route('customer.login');
        }
        $user = auth('customer')->user();
        if ($user->guard !== 'customer' || !$user->is_active) {
            auth('customer')->logout();
            return redirect()->route('customer.login')->withErrors(['email' => 'Access denied.']);
        }
        return $next($request);
    }
}
