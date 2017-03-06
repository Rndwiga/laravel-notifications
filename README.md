# laravel-registration-confirmation

add the service provider:
Tyondo\Notifications\TyondoNotificationsServiceProvider::class,

add the middleware:
\Tyondo\Notifications\Middleware\TyondoNotificationsMiddleware::class,
in the $middlewareGroups >> web