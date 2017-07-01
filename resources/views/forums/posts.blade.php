@extends('partials.layout')

@section('content')

    <section id="main-content" style="margin-top: 50px;">

        <div class="row">
            <div class="small-16 columns">
                <nav>
                    <ul class="breadcrumbs" style="margin-top: 10px;">
                        <li><a href="{{ route('forums.lists') }}">Forum</a></li>
                        <li><a href="{{ route('forums.details', $forum->id) }}">{{ $forum->name }}</a></li>
                        <li class="active">{{ $topic->name }}</li>
                    </ul>
                </nav>
                <h1>{{ $topic->name }}</h1>
                <h5>{{ $topic->description }}</h5>
            </div>
        </div>

        <div class="row">
            <section  class="small-16 columns">
                <div class="panel panel-rv">
                    <div class="callout">
                        <a href="#" data-toggle="popover" class="user-hovercard" data-placement="bottom" data-user-id="2">{{ \App\User::find($topic->user_id)->username }}</a>
                        <i class="sprite-forum sprite-forum-alpha"></i>
                        <span class="pull-right">
                                <span data-type="datetime">{{ $topic->created_at }}</span>
                            </span>
                    </div>
                    <div class="panel-body callout">
                        {!! $topic->text !!}
                        {{--<hr><div data-type="user-signature"><div class="text-center"><a href="https://steamcommunity.com/id/poep123" data-type="userlink" target="_blank"><img src="https://i.imgur.com/lDLfpiM.png" alt=""></a></div></div>--}}
                    </div>

                </div>
                <div class="big-sep" style="margin-top: 25px;"></div>

                @foreach($comments as $comment)
                    <div class="panel panel-rv">
                        <div class="callout">
                            <a href="#" data-toggle="popover" class="user-hovercard" data-placement="bottom" data-user-id="2">{{ \App\User::find($comment->user_id)->username }}</a>
                            <i class="sprite-forum sprite-forum-alpha"></i>
                            <span class="pull-right">
                                <span data-type="datetime">{{ $comment->created_at }}</span>
                            </span>
                        </div>
                        <div class="panel-body callout">
                            {!! $comment->comment !!}
                            {{--<hr><div data-type="user-signature"><div class="text-center"><a href="https://steamcommunity.com/id/poep123" data-type="userlink" target="_blank"><img src="https://i.imgur.com/lDLfpiM.png" alt=""></a></div></div>--}}
                        </div>

                    </div>
                    <div class="big-sep" style="margin-top: 25px;"></div>
                @endforeach

            </section>
        </div>

        <div class="row">
            <div class="small-16 large-16 columns callout">
                <div id="note"></div>
                <form method="POST" action="{{ route('forums.posts.doCreate', [$forum->id, $topic->id]) }}">
                    {{ csrf_field() }}

                    <label> <b style="color: black;">Write comment</b>
                        <textarea name="comment" rows="5" cols="40" placeholder="What do you have on your mind?" {{ ! Auth::check() ? 'disabled' : '' }} required></textarea>
                    </label>

                    @if(Auth::check())
                        <button type="submit" class="lime-button" name="submit" style="float: right;">Add comment</button>
                    @else
                        <a class="lime-button" href="{{ route('login') }}" style="float: right;">Login to comment on posts</a>
                    @endif
                </form>
            </div>
        </div>

    </section>

@stop