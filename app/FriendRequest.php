<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    public $fillable = ['sender', 'receiver', 'status'];
}
