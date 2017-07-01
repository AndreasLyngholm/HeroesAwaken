@extends('partials.layout')

@section('content')

    <section id="main-content" style="margin-top: 50px;">

        <div class="row">
            <div class="small-16 columns">
                <nav>
                    <ul class="breadcrumbs" style="margin-top: 10px;">
                        <li class="active">Forum</li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="small-16 columns">
                <h1>Forum</h1>
            </div>
        </div>

        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Forum name</th>
                    <th>Posts</th>
                    <th>Comments</th>
                    <th>Last post</th>
                </tr>
                </thead>
                <tbody>
                    {{--<tr class="forum-category">--}}
                        {{--<td colspan="5">Official Threads</td>--}}
                    {{--</tr>--}}
                    @foreach(\App\Forum::all() as $index => $forum)
                        <tr>
                            <td>
                                <p><b><a href="{{ route('forums.details', $forum->id) }}">{{ $forum->name }}</a></b></p>
                                <p>{{ $forum->description }}</p>
                            </td>
                            <td>{{ $forum->topics()->count() }}</td>
                            <td>{{ $forum->countComments() }}</td>
                            <td>
                                <p><b><a href="#">{{ \App\User::find($forum->lastComment()->user_id)->username }}</a></b></p>
                                <p>Last post by: <a href="#">{{ \App\User::find($forum->lastComment()->user_id)->username }}</a> - {{ $forum->lastComment()->created_at->diffForHumans() }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

@stop