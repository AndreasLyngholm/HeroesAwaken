<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFriend extends Model
{
    public $fillable = ['user_id', 'friend_id'];
}
