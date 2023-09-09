<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        if (auth()->check()) {
            $userRole = auth()->user()->role_id;

            // dd("Checking role: $userRole");

            if ($userRole == $role) {
                return $next($request);
            } else {
                abort(403, "Unauthorized Access");
            }
        }

        return redirect('/');
    }
}
