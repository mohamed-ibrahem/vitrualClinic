<?php

namespace App\Http\Middleware;

use Closure;

class UpdateFCMTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( auth()->check() ) {
            auth()->user()->update([
                'fcm_token' => $request->header('fcm_token')
            ]);
        }
        return $next($request);
    }
}
