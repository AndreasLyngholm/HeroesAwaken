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
use function App\Http\canDo;

Auth::routes();

Route::get('home', function () {
    return redirect()->route('home');
});

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

Route::get('about', [
    'as' => 'about',
    'uses' => 'HomeController@about'
]);

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth', 'acl']], function() {

    Route::get('/', [
        'as' => 'lists',
        'uses' => 'ProfileController@lists'
    ]);

    Route::get('answerFriendRequest', [
        'as' => 'answerFriendRequest',
        'uses' => 'ProfileController@answerFriendRequest'
    ]);

    Route::post('signature', [
        'as' => 'addSignature',
        'uses' => 'ProfileController@addSignature'
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

    Route::get('{forum}', [
        'as' => 'details',
        'uses' => 'ForumsController@forumsDetails'
    ]);

    Route::get('{forum}/create', [
        'middleware' => 'auth',
        'as' => 'details.doCreate',
        'uses' => 'ForumsController@forumsDetailsDoCreate'
    ]);

    Route::get('{forum}/{topic}', [
        'as' => 'posts',
        'uses' => 'ForumsController@forumsPosts'
    ]);

    Route::get('{forum}/{topic}/create', [
        'middleware' => 'auth',
        'as' => 'posts.doCreate',
        'uses' => 'ForumsController@forumsPostsDoCreate'
    ]);
});

// Admin interface
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'acl'], 'canDo' => 'user.update'], function () {

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
                'as' => 'ban.user',
                'uses' => 'UserController@banUser',
                'can' => 'user.ban'
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
        });
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
});