<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['prefix' => ''], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
    Route::get('norm', ['as' => 'norm', 'uses' => 'IndexController@norm']);
    Route::get('detail', ['as' => 'detail', 'uses' => 'IndexController@detail']);
    Route::get('vote', ['as' => 'vote', 'uses' => 'IndexController@vote']);


    Route::post('login', ['as' => 'login', 'uses' => 'IndexController@login']);
    Route::post('nominate', ['as' => 'nominate', 'uses' => 'NominateController@candidate']);
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('index', ['as' => 'admin/index', 'uses' => 'AdminController@index']);
});