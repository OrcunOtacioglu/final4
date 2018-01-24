<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Checks if the user is admin.
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest() || !Auth::user()->hasPermissionTo('view-dashboard')) {
            return redirect('/');
        }

        return $next($request);
    }
}
