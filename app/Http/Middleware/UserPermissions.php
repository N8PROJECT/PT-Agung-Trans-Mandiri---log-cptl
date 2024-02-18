<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        $user = $request->user();
    
        // Check if the user is authenticated and has permissions
        if ($user && $user->permissions !== null) {
            $userPermissions = json_decode($user->permissions, true); // Decode JSON to array

            if (!in_array($permission, $userPermissions)) {
                abort(403, 'Unauthorized');
            }
        } else {
            abort(403, 'Unauthorized'); // Permissions not found or user not authenticated
        }

        return $next($request);
    }
}
