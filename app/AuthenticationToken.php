<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthenticationToken extends Model {

    use SoftDeletes;

    protected $fillable = ['token','user_id','additional','expire_at'];

    protected $casts = [
        'additional' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}