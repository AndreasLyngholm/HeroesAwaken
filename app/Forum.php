<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $dates = ['last_comment'];

    public function topics()
    {
        return $this->hasMany('App\Topic')->with('author');
    }

    public function topicsWithComments()
    {
        return $this->hasMany('App\Topic')->with('comments');
    }

    public function countComments()
    {
        $count = 0;
        foreach ($this->topicsWithComments as $topic)
            $count = $count + $topic->comments->count();
        return $count;
    }

    public function lastComment()
    {
        $last = Comment::first();
        foreach ($this->topics as $topic)
            foreach ($topic->comments as $comment)
                if($last->created_at < $comment->created_at)
                    $last = $comment;
        return $last;
    }
}