<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class VerifyScadmin
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
        $scanmodel_id = 1;

        if (Auth::guest()) {
            return redirect()->guest('login');
        }

        if (! Auth::user()->roles->where('name', 'scadmin')->count()) {
            return response('Je hebt geen toegang tot deze functies', 401);
        }
        return $next($request);
    }
}
