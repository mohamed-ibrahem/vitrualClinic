<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->isAdmin())
                return redirect()->route('admin.home');

            if (Auth::user()->isDoctor())
                return redirect()->route('doctor.home');

            if (Auth::user()->isMember())
                return redirect()->route('member.home');

            return redirect('/home');
        }

        return $next($request);
    }
}
