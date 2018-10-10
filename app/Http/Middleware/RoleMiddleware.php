<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * @project VirtualClinic
     *
     * @param $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check())
            if (auth()->user()->hasRole($role))
                return $next($request);

        return abort(403);
    }
}
