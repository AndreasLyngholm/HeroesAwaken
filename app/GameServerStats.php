<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameServerStats extends Model
{
    protected $fillable = ['gid', 'statsKey', 'statsValue', 'created_at', 'updated_at'];
}
