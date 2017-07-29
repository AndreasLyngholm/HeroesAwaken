<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRevive extends Model
{
    protected $table = 'user_revive';

    protected $fillable = ['user_id', 'revive_id', 'revive_name', 'revive_email', 'revive_role'];
}
