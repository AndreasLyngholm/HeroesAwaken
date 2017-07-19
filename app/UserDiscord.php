<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDiscord extends Model
{
    protected $fillable = ['user_id', 'discord_id', 'discord_name', 'discord_email', 'discord_discriminator'];
}
