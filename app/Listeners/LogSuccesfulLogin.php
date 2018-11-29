<?php

namespace App\Listeners;

use Auth;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccesfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Auth::user()->increment('logincount');
        Auth::user()->save();
    }
}
