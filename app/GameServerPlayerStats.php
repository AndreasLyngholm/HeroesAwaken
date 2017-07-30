<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameServerPlayerStats extends Model
{
    protected $fillable = ['gid', 'pid', 'statsKey', 'statsValue'];
}
