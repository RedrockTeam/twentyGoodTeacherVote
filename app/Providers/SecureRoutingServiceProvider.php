<?php
/**
 * Created by PhpStorm.
 * User: Lich
 * Date: 15/12/25
 * Time: 16:44
 */
use Illuminate\Routing\UrlGenerator;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class SecureRoutingServiceProvider extends ServiceProvider {
    public function boot(\Illuminate\Routing\Router $router) {
        App::bind('url', function () {
            $generator = new UrlGenerator(
                App::make('router')->getRoutes(),
                App::make('request')

            );

            $generator->forceSchema('https');

            return $generator;
        });

        parent::boot();
    }
}