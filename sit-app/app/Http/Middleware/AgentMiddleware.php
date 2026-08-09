<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth('agent')->check()) {
            return redirect()->route('agent.login');
        }
        $user = auth('agent')->user();
        if ($user->guard !== 'agent' || !$user->is_active) {
            auth('agent')->logout();
            return redirect()->route('agent.login')->withErrors(['email' => 'Access denied.']);
        }
        return $next($request);
    }
}
