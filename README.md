# laravel-registration-confirmation

The ServiceProvider adds a route middleware you can use, called tyondo_notifications. You can apply this to a route or group to add Notifications support.

If you want Notifications to apply for all your routes, add it as global middleware in app/http/Kernel.php:
````
protected $middleware = [
    ....
    \Tyondo\Notifications\Middleware\TyondoNotificationsMiddleware::class,
];
````