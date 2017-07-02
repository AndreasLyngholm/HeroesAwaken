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

    // Really really dirty, please fix me!
    public function getComment()
    {
        $filter = array("<p>", "</p>", "<em>", "</em>", "<strong>", "</strong>", "<h1>", "</h1>", "<h2>", "</h2>", "<h3>", "</h3>", "<h4>", "</h4>");
        $comment = str_replace($filter, "", $this->comment);
        $comment = str_replace("<br />", "\n", $comment);
        return $comment;
    }
}