<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameServers extends Model
{
    protected $fillable = ['user_id', 'servername', 'secretKey'];
}
