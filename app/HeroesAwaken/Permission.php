<?php
/**
 * Created by PhpStorm.
 * User: Lyngholm
 * Date: 11-07-2017
 * Time: 22:27
 */

namespace App\HeroesAwaken;

use Auth;

class Permission {

    public function can($perm = null)
    {
        if ( ! Auth::check())
            return false;
        $user = Auth::user();
        if ($user->roles->count() == 0)
            return false;
        if ($perm)
            return $user->checkPermission($user->getArray($perm));
        return false;
    }
}