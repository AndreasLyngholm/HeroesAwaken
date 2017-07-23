<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use SoftDeletes;

    protected $fillable = ['user_id', 'topic_id', 'comment'];

    public function post()
    {
        return $this->belongsTo('App\Topic', 'topic_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}