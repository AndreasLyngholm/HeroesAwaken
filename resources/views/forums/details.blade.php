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
                            <a href="{{ route('forums.lists') }}">@lang('layout.forum')</a>
                             /
                        </small>
                        @lang('forum.' . strtolower($forum->name))
                    </h3>
                </nav>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>@lang('forum.title')</th>
                    <th>@lang('forum.replies')</th>
                    <th>@lang('forum.last_post')</th>
                </tr>
                </thead>
                <tbody>
                {{--<tr class="forum-category">--}}
                {{--<td colspan="5">Official Threads</td>--}}
                {{--</tr>--}}
                @foreach($topics as $topic)
                    <tr>
                        <td style="width:75%">
                            <p style="margin-bottom: 0rem;">
                                <b><a href="{{ route('forums.posts', [$forum->id, $topic->id]) }}">{{ $topic->name }}</a></b><br />
                                {{ $topic->description }}<br />
                                <small>by <a href="{{ route('profile.details', $topic->author->username) }}">{{ $topic->author->username }}</a></small>
                            </p>
                        </td>
                        <td>{{ $topic->comments->count() }}</td>
                        <td>
                            @if($topic->comments->count() > 0)
                                <p style="margin-bottom: 0rem;">
                                    <a href="{{ route('forums.posts', [$forum->id, $topic->id]) }}#{{ $topic->comments->last()->id }}">{{ $topic->comments->last()->created_at->diffForHumans() }}</a><br />
                                    <small>by <a href="{{ route('profile.details', $topic->comments->last()->author->username) }}">{{ $topic->comments->last()->author->username }}</a></small>
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

        <section class="row">
            <div class="small-16 columns">
                <!--PAGINATION-->
                <ul class="pagination">
                    {!! $topics->render() !!}
                </ul>
                <!--//PAGINATION-->
            </div>
        </section>

        @if(\App\can('forum.topic'))
            <div class="row">
                <div class="small-16 large-16 columns callout">
                    <form method="post" action="{{ route('forums.details.doCreate', $forum->id) }}">
                        {{ csrf_field() }}
                        <b style="color: black;">@lang('forum.create_new')</b>
                        <br><br>

                        <label> <b style="color: black;">@lang('forum.title')</b>
                            <input type="text" name="name" required>
                        </label>

                        <label> <b style="color: black;">@lang('forum.description')</b>
                            <input type="text" name="description" required>
                        </label>

                        <label> <b style="color: black;">@lang('forum.write_post')</b>
                            <textarea name="text" id="editor1" rows="5" cols="40" placeholder="Write your post here..." required></textarea>
                        </label>
                        <br>
                        <button type="submit" class="lime-button" name="submit" style="float: right;">@lang('forum.create_topic')</button>
                        <script>
                            CKEDITOR.replace( 'editor1', {
                                uiColor: '#E2D3C0',
                                removeButtons: 'Source'
                            });
                        </script>
                    </form>
                </div>
            </div>
        @endif

    </section>



@stop
