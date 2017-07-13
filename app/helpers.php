<?php

namespace App;

use App\AuthenticationToken;
use App\EntranceUser;
use App\User;
use App\Year;
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