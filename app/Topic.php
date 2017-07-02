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

    // Really really dirty, please fix me!
    public function getText()
    {
        $filter = array("<p>", "</p>", "<em>", "</em>", "<strong>", "</strong>", "<h1>", "</h1>", "<h2>", "</h2>", "<h3>", "</h3>", "<h4>", "</h4>");
        $text = str_replace($filter, "", $this->text);
        $text = str_replace("<br />", "\n", $text);
        return $text;
    }
}
