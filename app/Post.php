<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'forum_id'];

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function convasations()
    {
        return $this->hasMany('App\Convasation');
    }
}
