<?php

namespace Tyondo\LaravelNotifications\Middleware;


use Closure;
use Illuminate\Contracts\Auth\Guard;
use Notification;
use Tyondo\LaravelNotifications\Notifications\ConfirmEmailNotification;
use Tyondo\LaravelNotifications\Helpers\LaravelNotificationsHelper;
use Illuminate\Support\Facades\Auth;

class LaravelNotificationsMiddleware
{
    /**
     * @var Illuminate\Contracts\Auth\Guard
     */
    protected $auth;
    protected $user;

    /**
     * Create a new UserHasPermission instance.
     *
     * @param Guard $auth
     * @param mixed
     */
    public function __construct(Guard $auth, LaravelNotificationsHelper $laravelNotificationsHelper)
    {
        $this->auth = $auth;
        $this->laravelNotificationsHelper = $laravelNotificationsHelper;
        $this->user = config('laravel_notifications.options.model')::find(Auth::user()->id);
    }

    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (!$this->user->activated) {
                $this->laravelNotificationsHelper->sendActivationMail($this->user);
                auth()->logout();
                return back()->with('activationWarning', true);
            }
            if ($this->user->is_active == 0) {
                auth()->logout();
                return redirect($this->redirectPath());
            }
            $this->laravelNotificationsHelper->newLogin($request->ip(), $this->user);
            return back();
        }

        return $next($request);
    }
}
