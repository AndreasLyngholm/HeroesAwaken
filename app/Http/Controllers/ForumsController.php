<?php

namespace App\Http\Controllers;

use function App\can;
use App\Comment;
use App\Convasation;
use App\Forum;
use App\HeroesAwaken\FormValidation;
use App\Post;
use App\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ForumsController extends Controller
{
    public function forumsLists() //FORUMS
    {
        $forums = Forum::with('topics', 'topics.comments')->orderBy('id', 'desc')->paginate(25);

        return view('forums.lists', compact('forums'));
    }

    public function forumsDetails(Forum $forum) //TOPICS
    {
        $topics = Topic::where('forum_id', $forum->id)->orderBy('last_comment', 'desc')->with('comments')->paginate(25);

        return view('forums.details', compact('forum', 'topics'));
    }

    public function forumsDetailsDoCreate(Forum $forum, Request $request)
    {
        $test = str_replace(['&lt;script&gt;'], '', Input::get('text'));
        $test = str_replace(['&lt;/script&gt;'], '', $test);

        Topic::create([
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'text' => nl2br($test),
            'user_id' => Auth::id(),
            'forum_id' => $forum->id
        ]);

        return redirect()->route('forums.details', $forum->id);
    }

    public function forumsPosts(Forum $forum, Topic $topic) //POSTS
    {
        $comments = Comment::where('topic_id', $topic->id)->with('author', 'author.comments', 'author.roles')->paginate(25);
        return view('forums.posts', compact('forum', 'topic', 'comments'));
    }

    public function forumsPostsDoCreate(Forum $forum, Topic $topic)
    {
        $comment = str_replace(['&lt;script&gt;'], '', Input::get('comment'));
        $comment = str_replace(['&lt;/script&gt;'], '', $comment);

        Comment::create([
            'user_id' => Auth::id(),
            'topic_id' => $topic->id,
            'comment' => nl2br($comment)
        ]);

        $topic->update(['last_comment' => Carbon::now()]);
        return redirect()->route('forums.posts', [$forum->id, $topic->id]);
    }

    public function commentDelete(Comment $comment)
    {
        if( can('forum.delete') || $comment->user_id == Auth::id())
        {
            $comment->delete();
            return redirect()->back()->with('success', 'Your comment got deleted!');
        } else {
            return redirect()->back()->with('error', 'You do not have permissions to do this action!');
        }
    }

    public function topicDelete(Topic $topic)
    {
        if( can('forum.delete') || $topic->user_id == Auth::id())
        {
            $topic->delete();
            foreach ($topic->comments as $comment)
                $comment->delete();
            return redirect()->route('forums.lists')->with('success', 'Your topic got deleted!');
        } else {
            return redirect()->back()->with('error', 'You do not have permissions to do this action!');
        }
    }
}
