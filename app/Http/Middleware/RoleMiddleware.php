<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $userList = ['admin', 'teacher', 'student'];
        if (!Auth::check() || $userList[Auth::user()->role] !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
