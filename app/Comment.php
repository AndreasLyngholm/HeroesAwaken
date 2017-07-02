<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['user_id', 'topic_id', 'comment'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}