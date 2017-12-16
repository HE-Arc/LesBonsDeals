<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*if (Auth::guest()) {
            // If user not authenticated
            if ($request->ajax()) {
                // If ajax request return 401 respons
                return response('Unauthorized.', 401);
            }
            // Else redirect to login page
            return redirect('login');
        }*/
        return $next($request);
    }
}
