<?php

namespace App;

use App\AuthenticationToken;
use App\EntranceUser;
use App\User;
use App\Year;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

function me()
{
    if (AuthenticationToken::where('token', Input::get('token'))->exists())
    {
        $user = User::find(AuthenticationToken::where('token', Input::get('token'))->first()->user_id);
    } else {
        $user = null;
    }
    return $user;
}

function can($perm)
{
    $permission = app('App\HeroesAwaken\Permission');

    return $permission->can($perm);
}

function logAction($permission, $action, $log)
{
    Audit::create([
        'user_id' => Auth::id(),
        'permission' => $permission,
        'action' => $action,
        'ip_address' => request()->ip(),
        'log' => $log
    ]);
}

function onlineCount()
{
    $count = 0;
    Cache::remember('onlineUsers', 15, function() use ($count){
        foreach (User::all()->pluck('id')->all() as $id)
            if(Cache::has('user-is-online-' . $id))
                $count++;
        return $count;
    });
    return Cache::get('onlineUsers');
}