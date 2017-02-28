<?php namespace Tyondo\LaravelNotifications;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
//use Illuminate\Support\Facades\Schema;
//use Illuminate\Support\Facades\Config;

/**
 * A Laravel 5.3 user package
 *
 * @author: Rndwiga
 */
class LaravelNotificationsServiceProvider extends ServiceProvider {
    /**
     * Indicates of loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * This will be used to register config & view in 
     * your package namespace.
     *
     */
    protected $packageName = 'laravel_notifications';
    protected $packageNamespace = 'Tyondo\LaravelNotifications';

    /**
     * Bootstrap the application services.
     * @param mixed
     * @return void
     */
    public function boot(Router $router)
    {

        $router->group(
            [
                'prefix' => null,
                'namespace' => 'Tyondo\\LaravelNotifications\\Controllers',
            ], function(){
            $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
        }
        );

        // Merge config files
        $this->mergeConfigFrom(__DIR__.'/Config/laravel_registration_confirmation.php', $this->packageName);
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
        $this->registerMiddleware();
        $this->registerResources();

    }
    /**
     * @return void
     */
    protected function registerResources()
    {
        // Publish your config files
        $this->publishes([
            __DIR__.'/Config/laravel_notifications.php' => config_path($this->packageName.'.php')
        ], 'config');
    }
    /**
     * @return void
     */
    private function registerMiddleware()
    {
        $this->app['router']->middleware('laravel_notifications', $this->packageNamespace.'\Middleware\LaravelNotificationsMiddleware');
    }
}
