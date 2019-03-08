<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Scan;

class VerifyOwner
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
        $scanid = $request->route('scan')->id;
        $scan = Scan::findOrFail($scanid);
        if (Auth::guest()) {
            return redirect()->guest('login');
        }
        if (Auth::id() != $scan->user->id) {
            if(Auth::id() != $scan->group->owner->user->id) {
                return response('Je hebt geen toegang tot deze sessie', 401);
            }
        }
        return $next($request);
    }
}
