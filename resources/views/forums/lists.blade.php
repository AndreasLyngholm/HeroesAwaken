@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <nav>
                    <h3>
                        @lang('layout.forum')
                    </h3>
                </nav>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>@lang('forum.forum_name')</th>
                    <th>@lang('forum.posts')</th>
                    <th>@lang('forum.comments')</th>
                    <th>@lang('forum.last_post')</th>
                </tr>
                </thead>
                <tbody>
                    {{--<tr class="forum-category">--}}
                        {{--<td colspan="5">Official Threads</td>--}}
                    {{--</tr>--}}
                    @foreach($forums as $index => $forum)
                        <tr>
                            <td style="width:75%">
                                <p style="margin-bottom: 0rem;">
                                    <b><a href="{{ route('forums.details', $forum->id) }}">{{ $forum->name }}</a></b><br />
                                    {{ $forum->description }}
                                </p>
                            </td>
                            <td>{{ $forum->topics->count() }}</td>
                            <td>{{ $forum->countComments() }}</td>
                            <td>
                                @if($forum->topics->last())
                                    <p style="margin-bottom: 0rem;">
                                        <a href="{{ route('forums.posts', [$forum->id, $forum->topics->last()->topic_id]) }}">{{ $forum->topics->last()->created_at->diffForHumans() }}</a><br />
                                        <small>@lang('forum.by') <a href="{{ route('profile.details', $forum->topics->last()->author->username) }}">{{ $forum->topics->last()->author->username }}</a></small>
                                    </p>
                                @else
                                    <p style="margin-bottom: 0rem;">
                                        @lang('forum.no_comments')
                                    </p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

@stop
