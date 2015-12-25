<?php
/**
 * Created by PhpStorm.
 * User: Lich
 * Date: 15/12/25
 * Time: 16:44
 */
namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use \Illuminate\Routing\Router;

class SecureRoutingServiceProvider extends ServiceProvider {
    public function boot(Router $router) {
        $this->app->bind('url', function () {
            $generator = new UrlGenerator(
                $this->app->make('router')->getRoutes(),
                $this->app->make('request')

            );

            $generator->forceSchema('https');

            return $generator;
        });

    }
}