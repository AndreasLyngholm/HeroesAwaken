<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameServerPlayerstats extends Model
{
    protected $fillable = ['gid', 'pid', 'statsKey', 'statsValue'];
}
