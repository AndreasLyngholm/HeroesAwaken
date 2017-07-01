<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Convasation;
use App\Forum;
use App\Post;
use App\Topic;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ForumsController extends Controller
{
    public function forumsLists() //FORUMS
    {
        $forums = Forum::orderBy('id', 'desc')->paginate(25);
        return view('forums.lists', compact('forums'));
    }

    public function forumsDetails(Forum $forum) //TOPICS
    {
        $topics = $forum->topics()->orderBy('id', 'desc')->paginate(25);
        return view('forums.details', compact('forum', 'topics'));
    }

    public function forumsDetailsDoCreate(Forum $forum)
    {
        Topic::create([
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'text' => nl2br(Input::get('text')),
            'user_id' => Auth::id(),
            'forum_id' => $forum->id
        ]);

        return redirect()->route('forums.details', $forum->id);
    }

    public function forumsPosts(Forum $forum, Topic $topic) //POSTS
    {
        $comments = $topic->comments()->paginate(25);
        return view('forums.posts', compact('forum', 'topic', 'comments'));
    }

    public function forumsPostsDoCreate(Forum $forum, Topic $topic)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'topic_id' => $topic->id,
            'comment' => nl2br(Input::get('comment'))
        ]);
        return redirect()->route('forums.posts', [$forum->id, $topic->id]);
    }
}
