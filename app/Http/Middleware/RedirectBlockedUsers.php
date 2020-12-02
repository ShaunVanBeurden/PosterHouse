<?php

namespace App\Http\Middleware;

use Closure;

class RedirectBlockedUsers
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
        if (currentUser()->blocked()) {
            return abort(403);
        }

        return $next($request);
    }
}
