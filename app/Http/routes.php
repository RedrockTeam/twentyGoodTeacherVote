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
    Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']); //首页
    Route::get('norm', ['as' => 'norm', 'uses' => 'IndexController@norm']); //提名页面
    Route::get('detail', ['as' => 'detail', 'uses' => 'IndexController@detail']); //候选人详情
    Route::get('vote', ['as' => 'vote', 'uses' => 'IndexController@vote']); //投票
    Route::get('talk', ['as' => 'talk', 'uses' => 'IndexController@talk']); //投票
    Route::get('logout', ['as' => 'logout', 'uses' => 'IndexController@logout']); //登出

    Route::post('login', ['as' => 'login', 'uses' => 'IndexController@login']); //登录
    Route::post('nominate', ['as' => 'nominate', 'uses' => 'NominateController@candidate']); //提名方法

    //RESTful test
    Route::resource('ad', 'AdController', ['only' => ['index', 'show', 'create', 'destroy']]);

});

Route::group(['prefix' => 'admin'], function() {
    Route::get('index', ['as' => 'admin/index', 'uses' => 'AdminController@index']);
    Route::post('edit', ['as' => 'admin/edit', 'uses' => 'AdminController@edit']);
    Route::post('updatestatus', ['as' => 'admin/updatestatus', 'uses' => 'AdminController@operationCandidate']);
});