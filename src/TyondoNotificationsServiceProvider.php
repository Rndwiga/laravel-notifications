<?php namespace Tyondo\Notifications;


use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Schema;
/**
 * A Laravel 5.3 user package
 *
 * @author: Rndwiga
 */
class TyondoNotificationsServiceProvider extends ServiceProvider {
    /**
     * Indicates of loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * This will be used to register config & view in 
     * your package namespace.
     */
    protected $packageName = 'tyondo_notifications';
    protected $packageNamespace = 'Tyondo\Notifications';

    /**
     * Bootstrap the application services.
     * @param mixed
     * @return void
     */
    public function boot(Router $router)
    {
        Schema::defaultStringLength(191);
        $router->group(
            [
                'prefix' => null,
                'namespace' => 'Tyondo\\Notifications\\Controllers',
            ], function(){
            $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
        }
        );


        // Merge config files
        $this->mergeConfigFrom(__DIR__.'/Config/tyondo_notifications.php', $this->packageName);
		// Register Views
        //$this->loadViewsFrom(__DIR__.'/views', $this->packageName);


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //registering package service providers and aliases
        $this->registerResources();
        $this->registerMiddleware();


    }
    /**
     * @return void
     */
    protected function registerResources()
    {
        // Publish your config files
        $this->publishes([
            __DIR__.'/Config/tyondo_notifications.php' => config_path($this->packageName.'.php')
        ], 'config');
        // Publish your config files
        $this->publishes([
            __DIR__.'/Database/Migrations/' => base_path('database/migrations')
        ], 'migrations');
    }
    /**
     * @return void
     */
    private function registerMiddleware()
    {
        if (method_exists($this->app['router'], 'aliasMiddleware')) {
            $this->app['router']->aliasMiddleware('tyondo_notifications', \Tyondo\Notifications\Middleware\TyondoNotificationsMiddleware::class);
        } else {
            $this->app['router']->middleware('tyondo_notifications', \Tyondo\Notifications\Middleware\TyondoNotificationsMiddleware::class);
        }
    }
}
