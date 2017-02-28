<?php

namespace Tyondo\RegistrationConfirmation\Middleware;


use Closure;
use Illuminate\Contracts\Auth\Guard;
use Notification;
use Tyondo\RegistrationConfirmation\Notifications\ConfirmEmailNotification;

class UserHasPermission
{
    /**
     * @var Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new UserHasPermission instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $closure
     * @param array|string             $permissions
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions)
    {
        if ($this->auth->check()) {

        }

        return $next($request);
    }
}
