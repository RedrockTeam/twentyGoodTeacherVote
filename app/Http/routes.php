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
    Route::get('votePage', ['as' => 'vote', 'uses' => 'IndexController@vote']); //投票
    Route::get('talk', ['as' => 'talk', 'uses' => 'IndexController@talk']); //投票
    Route::get('logout', ['as' => 'logout', 'uses' => 'IndexController@logout']); //登出

    Route::post('login', ['as' => 'login', 'uses' => 'IndexController@login']); //登录
    Route::post('nominate', ['as' => 'nominate', 'uses' => 'NominateController@candidate']); //提名方法
    Route::post('vote', ['as' => 'voteMethod', 'uses' => 'VoteController@update']);


    //RESTful test
    Route::resource('ad', 'AdController', ['only' => ['index', 'show', 'create', 'destroy', 'update']]);


});

Route::group(['prefix' => 'admin'], function() {
    Route::get('index', ['as' => 'admin/index', 'uses' => 'AdminController@index']);
    Route::get('add', ['as' => 'admin/add', 'uses' => 'AdminController@add']);
    Route::get('login', ['as' => 'admin/login', 'uses' => 'AdminController@login']);
    Route::post('edit', ['as' => 'admin/edit', 'uses' => 'AdminController@edit']);
    Route::post('verify', ['as' => 'admin/verify', 'uses' => 'AdminController@verify']);
    Route::post('addCandidate', ['as' => 'admin/addCandidate', 'uses' => 'AdminController@addCandidate']);
    Route::post('updatestatus', ['as' => 'admin/updatestatus', 'uses' => 'AdminController@operationCandidate']);
});