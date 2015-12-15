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
    Route::get('/', ['https', ['as' => 'index', 'uses' => 'IndexController@index']]); //首页
    Route::get('norm', ['as' => 'norm', 'uses' => 'IndexController@norm']); //提名页面
    Route::get('detail', ['as' => 'detail', 'uses' => 'IndexController@detail']); //候选人详情
    Route::get('votePage', ['as' => 'vote', 'uses' => 'IndexController@vote']); //投票
    Route::get('talk', ['as' => 'talk', 'uses' => 'IndexController@talk']); //投票
    Route::get('rank', ['as' => 'rank', 'uses' => 'IndexController@rank']); //list
    Route::get('logout', ['as' => 'logout', 'uses' => 'IndexController@logout']); //登出
    Route::get('mobilemo', ['as' => 'mobileindex', 'uses' => 'IndexController@mmo']); //移动端mo
    Route::get('mobileyo', ['as' => 'mobileindex', 'uses' => 'IndexController@myo']); //移动端mo
    Route::get('attenttion', ['as' => 'attention', 'uses' => function() {
        $openid = Input::only('openid');
        return view('attention')->with('openid', $openid['openid']);
    }]); //bind
    Route::post('login', ['as' => 'login', 'uses' => 'IndexController@login']); //登录
    Route::post('nominate', ['as' => 'nominate', 'uses' => 'NominateController@candidate']); //提名方法
    Route::post('vote', ['as' => 'voteMethod', 'uses' => 'VoteController@update']);
    Route::post('wechatvote', ['as' => 'wechatvote', 'uses' => 'VoteController@weixinUpdate']);

    //RESTful test
    Route::resource('ad', 'AdController', ['only' => ['index', 'show', 'create', 'destroy', 'update']]);


});

Route::group(['prefix' => 'admin'], function() {
    Route::get('index', ['as' => 'admin/index', 'uses' => 'AdminController@index']);
    Route::get('add', ['as' => 'admin/add', 'uses' => 'AdminController@add']);
    Route::get('ad', ['as' => 'admin/ad', 'uses' => 'AdminController@ad']);
    Route::get('adEdit', ['as' => 'admin/adEdit', 'uses' => 'AdminController@adEdit']);
    Route::get('login', ['as' => 'admin/login', 'uses' => 'AdminController@login']);
    Route::get('editAd', ['as' => 'admin/editAd', 'uses' => 'AdminController@editAd']);
    Route::post('edit', ['as' => 'admin/edit', 'uses' => 'AdminController@edit']);
    Route::post('editphoto', ['as' => 'admin/editphoto', 'uses' => 'AdminController@editphoto']);
    Route::post('addad', ['as' => 'admin/addad', 'uses' => 'AdminController@addAd']);
    Route::post('adDel', ['as' => 'admin/adDel', 'uses' => 'AdminController@adDel']);
    Route::post('verify', ['as' => 'admin/verify', 'uses' => 'AdminController@verify']);
    Route::post('addCandidate', ['as' => 'admin/addCandidate', 'uses' => 'AdminController@addCandidate']);
    Route::post('updatestatus', ['as' => 'admin/updatestatus', 'uses' => 'AdminController@operationCandidate']);
});
