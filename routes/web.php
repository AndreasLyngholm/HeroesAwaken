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