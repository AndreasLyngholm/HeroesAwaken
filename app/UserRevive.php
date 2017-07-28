<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRevive extends Model
{
    protected $fillable = ['user_id', 'discord_id'];
}
