<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserRole
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

        $roles = explode('|',$role);

        if (! $request->user()->hasRole($roles)) {
            // Redirect...
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
