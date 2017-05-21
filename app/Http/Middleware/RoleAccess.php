<?php

namespace App\Http\Middleware;

use Closure;

class RoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = $request->user();
        
        if ($user->can($role. '-access', $user->role)) {
            return $next($request);
        }   return redirect()->back();
    }
}
