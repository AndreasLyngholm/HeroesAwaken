<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('home', function () {
    return redirect()->route('home');
});

Route::post('set-language', [
    'as' => 'setLanguage',
    'uses' => 'HomeController@setLanguage'
]);

Route::get('set-state/{state}', [
    'as' => 'setState',
    'uses' => 'HomeController@setState'
]);

Route::get('download', [
    'middleware' => 'auth',
    'as' => 'download',
    'uses' => 'HomeController@downloadClient'
]);

Route::get('logout', [
    'as' => 'doLogout',
    'uses' => 'HomeController@doLogout'
]);

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@home'
]);

Route::get('news', [
    'as' => 'news',
    'uses' => 'HomeController@news'
]);

Route::get('contact', [
    'as' => 'contact',
    'uses' => 'HomeController@contact'
]);

Route::get('team', [
    'as' => 'team',
    'uses' => 'HomeController@team'
]);

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth', 'acl']], function() {

    Route::get('/', [
        'as' => 'lists',
        'uses' => 'ProfileController@lists'
    ]);

    Route::get('create/hero', [
        'as' => 'createHero',
        'uses' => 'ProfileController@createHero',
        'can' => 'game.createhero'
    ]);

    Route::post('create/hero', [
        'as' => 'doCreateHero',
        'uses' => 'ProfileController@doCreateHero',
        'can' => 'game.createhero'
    ]);

    Route::post('create/hero/availability', [
        'as' => 'createHeroAvailability',
        'uses' => 'ProfileController@createHeroAvailability',
        'can' => 'game.createhero'
    ]);

    Route::post('change/password', [
        'as' => 'changePassword',
        'uses' => 'ProfileController@changePassword'
    ]);

    Route::get('link/discord', [
        'as' => 'linkDiscord',
        'uses' => 'ProfileController@linkDiscord'
    ]);

    Route::get('link/revive', [
        'as' => 'linkRevive',
        'uses' => 'ProfileController@linkRevive'
    ]);

    Route::get('answerFriendRequest', [
        'as' => 'answerFriendRequest',
        'uses' => 'ProfileController@answerFriendRequest'
    ]);

    Route::get('answerAll', [
        'as' => 'answerAll',
        'uses' => 'ProfileController@answerAll'
    ]);

    Route::post('signature', [
        'as' => 'addSignature',
        'uses' => 'ProfileController@addSignature'
    ]);

    Route::post('avatar', [
        'as' => 'addAvatar',
        'uses' => 'ProfileController@addAvatar'
    ]);

    Route::post('description', [
        'as' => 'addDescription',
        'uses' => 'ProfileController@addDescription'
    ]);

    Route::get('{username}', [
        'as' => 'details',
        'uses' => 'ProfileController@details'
    ]);

    Route::get('{user_id}/add', [
        'as' => 'addFriend',
        'uses' => 'ProfileController@addFriend'
    ]);

    Route::get('{user_id}/remove', [
        'as' => 'removeFriend',
        'uses' => 'ProfileController@removeFriend'
    ]);

});

Route::group(['prefix' => 'forums', 'as' => 'forums.'], function() {

    Route::get('/', [
        'as' => 'lists',
        'uses' => 'ForumsController@forumsLists'
    ]);

    Route::get('comment/delete/{comment}', [
        'middleware' => ['auth', 'acl'],
        'as' => 'commentDelete',
        'uses' => 'ForumsController@commentDelete'
    ]);

    Route::get('topic/delete/{topic}', [
        'middleware' => ['auth', 'acl'],
        'as' => 'topicDelete',
        'uses' => 'ForumsController@topicDelete'
    ]);

    Route::get('{forum}', [
        'as' => 'details',
        'uses' => 'ForumsController@forumsDetails'
    ]);

    Route::post('{forum}/create', [
        'middleware' => ['auth', 'acl'],
        'as' => 'details.doCreate',
        'uses' => 'ForumsController@forumsDetailsDoCreate',
        'can'  => 'forum.topic'
    ]);

    Route::get('{forum}/{topic}', [
        'as' => 'posts',
        'uses' => 'ForumsController@forumsPosts',
        'can'  => 'forum.post'
    ]);

    Route::post('{forum}/{topic}/create', [
        'middleware' => ['auth', 'acl'],
        'as' => 'posts.doCreate',
        'uses' => 'ForumsController@forumsPostsDoCreate',
        'can'  => 'forum.comment'
    ]);
});

// Games listing
Route::group(['prefix' => 'games', 'as' => 'games.', 'namespace' => 'Games'], function() {
    Route::get('/', [
        'as'    => 'games',
        'uses' => 'GamesController@list',
    ]);

    Route::post('/', [
        'as'    => 'games',
        'middleware' => ['auth', 'acl'],
        'can'  => 'game.matchmake',
        'uses' => 'GamesController@list',
    ]);

    Route::get('{gameid}', [
        'as' => 'game.details',
        'uses' => 'GamesController@details',
    ]);
});

// Admin interface
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'acl']], function () {

    Route::group(['prefix' => 'users'], function ()
    {
        Route::group(['prefix' => 'manage'], function ()
        {
            Route::get('/', [
                'as'   => 'user.manage',
                'uses' => 'UserController@manage',
                'can'  => 'user.update'
            ]);

            Route::get('{user}', [
                'as'   => 'user.details',
                'uses' => 'UserController@details',
                'can'  => 'user.update'
            ]);

            Route::post('{user}/assign/role/{role}', [
                'as'   => 'assign.role',
                'uses' => 'UserController@assignRole',
                'can'  => 'user.roles'
            ]);

            Route::get('{user}/remove/{role}', [
                'as'   => 'remove.role',
                'uses' => 'UserController@removeRole',
                'can'  => 'user.roles'
            ]);

            Route::get('{user}/punish/{type}/{expiration}',[
                'as'   => 'ban.user',
                'uses' => 'UserController@banUser',
                'can'  => 'user.ban'
            ]);
        });

        Route::group(['prefix' => 'roles'], function ()
        {
            Route::get('/', [
                'as'   => 'user.roles',
                'uses' => 'UserController@roles',
                'can'  => 'user.roles'
            ]);

            Route::get('add', [
                'as'   => 'user.roles.add',
                'uses' => 'UserController@addRole',
                'can'  => 'user.roles'
            ]);

            Route::post('add', [
                'as'   => 'user.roles.doAdd',
                'uses' => 'UserController@doAddRole',
                'can'  => 'user.roles'
            ]);

            Route::get('{role}', [
                'as'   => 'role.details',
                'uses' => 'RoleController@details',
                'can'  => 'user.roles'
            ]);

            Route::post('{role}/update', [
                'as'   => 'role.update',
                'uses' => 'RoleController@update',
                'can'  => 'user.roles'
            ]);

            Route::get('{role}/delete', [
                'as'   => 'role.delete',
                'uses' => 'RoleController@delete',
                'can'  => 'user.roles'
            ]);
        });
    });
    Route::group(['prefix' => 'news'], function ()
    {
        Route::get('/', [
            'as' => 'news.lists',
            'uses' => 'NewsController@lists',
            'can' => 'news.manage'
        ]);

        Route::get('create', [
            'as' => 'news.create',
            'uses' => 'NewsController@create',
            'can' => 'news.add'
        ]);

        Route::post('create', [
            'as' => 'news.doCreate',
            'uses' => 'NewsController@doCreate',
            'can' => 'news.add'
        ]);

        Route::get('{news}/delete', [
            'as' => 'news.delete',
            'uses' => 'NewsController@delete',
            'can' => 'news.manage'
        ]);

        Route::get('{news}/edit', [
            'as' => 'news.edit',
            'uses' => 'NewsController@edit',
            'can' => 'news.manage'
        ]);

        Route::post('{news}/edit', [
            'as' => 'news.doEdit',
            'uses' => 'NewsController@doEdit',
            'can' => 'news.manage'
        ]);
    });

    Route::group(['prefix' => 'audit'], function ()
    {
        Route::get('/', [
            'as' => 'audit.lists',
            'uses' => 'AuditController@lists',
            'can' => 'audit.manage'
        ]);
    });

});

// API
Route::group(['prefix' => 'api', 'as' => 'api.', 'namespace' => 'Api', 'middleware' => 'api'], function ()
{
    Route::get('token', [
        'uses' => 'ApiController@token'
    ]);

    Route::get('check', [
        'uses' => 'ApiController@check'
    ]);

    Route::get('user', [
        'uses' => 'ApiController@user'
    ]);

    Route::group(['prefix' => 'mm'], function ()
    {
        Route::get('findgame/{shardid}/{heroid}/{ipint}', [
            'uses' => 'MatchmakingController@findgame'
        ]);
    });
});
