<?php
/**
 * Created by PhpStorm.
 * User: Lich
 * Date: 15/12/25
 * Time: 16:44
 */
use Illuminate\Routing\UrlGenerator;
use Illuminate\Routing\RoutingServiceProvider;

class SecureRoutingServiceProvider extends ServiceProvider {
    public function boot() {
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