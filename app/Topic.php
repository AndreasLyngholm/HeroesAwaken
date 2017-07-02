<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'user_id', 'forum_id', 'text'];

    public function forum()
    {
        return $this->belongsTo('App\Forum');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
