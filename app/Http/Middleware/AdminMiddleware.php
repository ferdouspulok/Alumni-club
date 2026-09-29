<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access the admin area.');
        }

        $user = Auth::user();

        if ($user->status !== 'active') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is inactive. Please contact club administration.');
        }

        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized access: Admin privileges required.');
        }

        // If specific roles are passed, check role
        if (!empty($roles) && !in_array($user->role, $roles) && !$user->isSuperAdmin()) {
            abort(403, 'Unauthorized: You do not have sufficient permissions for this section.');
        }

        return $next($request);
    }
}
