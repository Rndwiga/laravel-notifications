<?php

namespace Tyondo\RegistrationConfirmation\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisteredUserListener
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
     * @param  Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Illuminate\Auth\Events\Registered $event)
    {
        //
    }
}
