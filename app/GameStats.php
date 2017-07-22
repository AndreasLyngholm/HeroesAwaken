<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameStats extends Model
{
    protected $fillable = ['user_id', 'herId', 'statsKey', 'statsValue'];
}
