<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSignature extends Model
{
    protected $fillable = ['image', 'user_id'];
}