# laravel-registration-confirmation

add the service provider:
Tyondo\Notifications\TyondoNotificationsServiceProvider::class,

If you want Notifications to apply for all your routes, add it as global middleware in app/http/Kernel.php:
````
protected $middleware = [
    ....
    \Tyondo\Notifications\Middleware\TyondoNotificationsMiddleware::class,
];
````