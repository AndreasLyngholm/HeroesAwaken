@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <nav>
                    <h3>
                        <small>
                            <a href="{{ route('forums.lists') }}">Forum</a>
                             / 
                             <a href="{{ route('forums.details', $forum->id) }}">{{ $forum->name }}</a>
                             /
                        </small>
                        {{ $topic->name }}
                    </h3>
                </nav>
                <h5>{{ $topic->description }}</h5>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <section  class="small-16 columns">
                <div class="panel panel-rv">
                    <div class="callout">
                        <a href="#" data-toggle="popover" class="user-hovercard" data-placement="bottom" data-user-id="2">Created by {{ \App\User::find($topic->user_id)->username }}</a>
                        <i class="sprite-forum sprite-forum-alpha"></i>
                        <span class="pull-right">
                                <span data-type="datetime">{{ $topic->created_at }}</span>
                            </span>
                    </div>
                    <div class="panel-body callout secondary" style="margin-top: -15px;">
                        {!! $topic->text !!}
                        @if(\App\User::find($topic->user_id)->signature != null)
                            <hr>
                            <div data-type="user-signature">
                                <div class="text-center">
                                    <a href="#" data-type="userlink">
                                        <img style="max-height: 250px;" src="{{ \App\User::find($topic->user_id)->signature->image }}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="big-sep"></div>
                <h2>Comments</h2>

                @foreach($comments as $comment)
                    <div class="panel">
                        <div class="callout">
                            <a href="#" data-toggle="popover" class="user-hovercard" data-placement="bottom" data-user-id="2"><i class="fa fa-user"></i> {{ \App\User::find($comment->user_id)->username }}</a>
                            <i class="sprite-forum sprite-forum-alpha"></i>
                            <span class="pull-right">
                                <span data-type="datetime">{{ $comment->created_at }}</span>
                            </span>
                        </div>
                        <div class="panel-body callout secondary" style="margin-top: -15px;">
                            {!! $comment->comment !!}
                            @if(\App\User::find($comment->user_id)->signature != null)
                                <hr>
                                <div data-type="user-signature">
                                    <div class="text-center">
                                        <a href="#" data-type="userlink">
                                            <img src="{{ \App\User::find($comment->user_id)->signature->image }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="big-sep" style="margin-top: 25px;"></div>
                @endforeach

            </section>
        </div>
        <div class="row">
            <div class="small-16 large-16 columns callout">
                <div id="note"></div>
                <form method="get" action="{{ route('forums.posts.doCreate', [$forum->id, $topic->id]) }}">
                    {{ csrf_field() }}
                    <label> <b style="color: black;">Write comment</b>
                        <textarea name="comment" id="editor1" rows="5" cols="40" placeholder="What do you have on your mind?"  required></textarea>
                    </label>
                    <br>
                        <button type="submit" class="lime-button" name="submit" style="float: right;">Add comment</button>
                    <script>
                        CKEDITOR.replace( 'editor1', {
                            uiColor: '#E2D3C0'
                        });
                    </script>
                </form>
            </div>
        </div>

    </section>

@stop
