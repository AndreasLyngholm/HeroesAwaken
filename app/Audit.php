<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    public $fillable = ['user_id', 'permission', 'action', 'ip_address', 'log'];

    public $casts = [
        'log' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
