<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|array  $roles  The role(s) required to access the route.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) { // Not logged in
            return redirect('login');
        }

        $user = Auth::user();

        // Ensure roles are passed correctly
        if (empty($roles)) {
             // Or handle this scenario as needed, maybe deny access?
             \Log::warning('No roles specified for CheckUserRole middleware on route: ' . $request->route()->getName());
             return $next($request); // Or abort(403, 'Access Denied: Role configuration error.');
        }

        // Allow if user has any of the specified roles
        if ($user->hasAnyRole($roles)) {
            return $next($request);
        }

        // User does not have any of the required roles
        // You could redirect to a specific 'unauthorized' page or just abort
        // return redirect('/unauthorized');
        abort(403, 'Access Denied: You do not have the required permissions.');
    }
}