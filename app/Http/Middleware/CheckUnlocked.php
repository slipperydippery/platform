<?php

namespace App\Http\Middleware;

use Closure;
use App\Scan;
use App\Group;

class CheckUnlocked
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
        $scan = Scan::findOrFail( $request->route('scan')->id );
        if(! $scan->group) return $next($request);
        $group = Group::findOrFail( $scan->group->id );
        if(! $group->unlocked) {
            return redirect()->route('scan.start', $scan);
        }
        return $next($request);
    }
}
