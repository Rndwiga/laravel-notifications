<?php

namespace Tyondo\Notifications\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Tyondo\Notifications\Helpers\TyondoNotificationsHelper;
use Illuminate\Support\Facades\Auth;

class RegisteredUserListener
{
    /**
     * Create the event listener.
     * @param mixed
     *
     */
    public function __construct(TyondoNotificationsHelper $laravelNotificationsHelper)
    {
        $this->laravelNotificationsHelper = $laravelNotificationsHelper;
    }

    /**
     * Handle the event.
     *
     * @param  Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Illuminate\Auth\Events\Registered $event)
    {
        Auth::logout();
        return redirect('/login')->with('activationStatus', true);
    }
}
