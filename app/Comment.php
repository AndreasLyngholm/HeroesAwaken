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

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}