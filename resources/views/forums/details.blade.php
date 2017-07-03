@extends('partials.layout')

@section('content')

    <section class="inner-slider">
      <div style="background: url('{{ asset('images/slider_bg.png') }}')"></div>
    </section>

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <nav>
                    <h3>
                        <small>
                            <a href="{{ route('forums.lists') }}">Forum</a>
                             / 
                        </small>
                        {{ $forum->name }}
                    </h3>
                </nav>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Owner</th>
                    <th>Replies</th>
                    <th>Last post</th>
                </tr>
                </thead>
                <tbody>
                {{--<tr class="forum-category">--}}
                {{--<td colspan="5">Official Threads</td>--}}
                {{--</tr>--}}
                @foreach($topics as $topic)
                    <tr>
                        <td style="max-width:425px">
                            <p><b><a href="{{ route('forums.posts', [$forum->id, $topic->id]) }}">{{ $topic->name }}</a></b></p>
                            <p>{{ $topic->description }}</p>
                        </td>
                        <td>{{ \App\User::find($topic->user_id)->username }}</td>
                        <td>{{ $topic->comments()->count() }}</td>
                        <td>
                            @if($topic->comments->count() > 0)
                                <p><b><a href="#">{{ \App\User::find($topic->comments->last()->user_id)->username }}</a></b></p>
                                <p>Last comment by: <a href="#">{{ \App\User::find($topic->comments->last()->user_id)->username }}</a> - {{ $topic->comments->last()->created_at->diffForHumans() }}</p>
                            @else
                                <p><b><a href="#"></a></b></p>
                                <p>No comments posted yet</p>
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

        <div class="row">
            <div class="small-16 large-16 columns callout">
                <form method="get" action="{{ route('forums.details.doCreate', $forum->id) }}">
                    {{ csrf_field() }}
                    <b style="color: black;">Create new topic</b>
                    <br><br>

                    <label> <b style="color: black;">Title</b>
                        <input type="text" name="name" required>
                    </label>

                    <label> <b style="color: black;">Description</b>
                        <input type="text" name="description" required>
                    </label>

                    <label> <b style="color: black;">Write your post</b>
                        <textarea name="text" id="editor1" rows="5" cols="40" placeholder="Write your post here..." required></textarea>
                    </label>
                    <br>
                    <button type="submit" class="lime-button" name="submit" style="float: right;">Create Topic</button>
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