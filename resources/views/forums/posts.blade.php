@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <nav class="float-left">
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
				<span class="pull-right" style="margin-top: 15px;"><h5>{{ $topic->description }}</h5></span>
                <div class="big-sep" style="margin-top: 50px;"></div>
            </div>
        </div>

        <div class="row">
            <section class="small-16 columns">
                <div class="panel panel-rv" id="0">
					<div class="post-left">
						<div class="user">
							<div class="username">
								<a href="{{ route('profile.details', $topic->author->username) }}" data-toggle="popover" class="user-hovercard" data-placement="bottom" data-user-id="2">{{ \App\User::find($topic->user_id)->username }}</a>
							</div>
							<div class="user-content">
								@if($topic->author->avatar != null)
								<img src="{{ str_replace("?", "", route('home', $topic->author->avatar)) }}">
								@else
								<img src="{{ asset('images/placeholders/comment.png') }}">
								@endif
								<div class="user-info">
                                    <div class="tag dev" style="color: white; padding: 5px; margin: 5px auto; width: 80%; border-radius: 10px; background: radial-gradient(ellipse at center, #88332E 0%,#88332E 66%,#88332E 100%);">
                                        {{ $topic->author->roles->last()->title }}
                                    </div>

									<table>
										<tr class="joindate">
											<td>Member since:</td>
											<td>{{ $topic->author->created_at->format('d-m-Y') }}</td>
										</tr>
										<tr class="posts">
											<td>Comments:</td>
											<td>{{ $topic->author->comments()->count() }}</td>
										</tr>
										<tr class="heroes">
											<td>Heroes:</td>
											<td>0</td>
										<tr>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="post-right">
						<div class="panel-body callout secondary">
							<div class="message-header">
								<i class="sprite-forum sprite-forum-alpha"></i>
								<span class="push">Push</span>
								<span class="pull-right">
									<span data-type="datetime">{{ $topic->created_at }}</span>
									|
									<a onclick="copied()" class="clipboard" data-clipboard-text="{{ URL::current() }}#{{ 0 }}"> <i class="fa fa-link"></i> </a>
									@include('partials.addFriend', ['user_id' => $topic->user_id])
								</span>
							</div>
							<div class="message-contents">
								{!! $topic->text !!}
								@if(\App\User::find($topic->user_id)->signature != null)
									<hr>
									<div data-type="user-signature">
										<div class="text-center">
											<a href="{{ route('profile.details', \App\User::find($topic->user_id)->username) }}" data-type="userlink">
												<img style="max-height: 200px;" src="{{ str_replace("?", "", route('home', App\User::find($topic->user_id)->signature->image)) }}" alt="">
											</a>
										</div>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>

				<br>

                @foreach($comments as $comment)
				<div class="panel" id="{{ $comment->id }}">
					<div class="post-left">
						<div class="user">
							<div class="username">
								<a  href="{{ route('profile.details', $comment->author->username) }}" data-toggle="popover" class="user-hovercard" data-placement="bottom" data-user-id="2"> {{ $comment->author->username }}</a>
							</div>
							<div class="user-content">
								@if($comment->author->avatar != null)
									<img src="{{ str_replace("?", "", route('home', $comment->author->avatar)) }}">
								@else
									<img src="{{ asset('images/placeholders/comment.png') }}">
								@endif
								<div class="user-info">
									<div class="tag dev" style="color: white; padding: 5px; margin: 5px auto; width: 80%; border-radius: 10px; background: radial-gradient(ellipse at center, #88332E 0%,#88332E 66%,#88332E 100%);">
										{{ $comment->author->roles->last()->title }}
									</div>
									<table>
										<tr class="joindate">
											<td>Member since:</td>
											<td>{{ $comment->author->created_at->format('d-m-Y') }}</td>
										</tr>
										<tr class="posts">
											<td>Comments:</td>
											<td>{{ $comment->author->comments->count() }}</td>
										</tr>
										<tr class="heroes">
											<td>Heroes:</td>
											<td>0</td>
										<tr>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="post-right">
						<div class="panel-body callout secondary">
							<div class="message-header">
								<i class="sprite-forum sprite-forum-alpha"></i>
								<span class="push">Push</span>
								<span class="pull-right">
									<span data-type="datetime">{{ $comment->created_at }}</span>
									|
									<a onclick="copied()" class="clipboard" data-clipboard-text="{{ URL::current() }}#{{ $comment->id }}"> <i class="fa fa-link"></i> </a>
                                    @if(Auth::check() && $comment->user_id != Auth::id())
                                        |
                                        @if(! Auth::user()->isFriend($comment->user_id))
                                            @if(\App\FriendRequest::where('receiver', Auth::user()->id)->where('sender', $comment->user_id)->exists())
                                                <a class="pull-right" href="{{ route('profile.addFriend', $comment->user_id) }}"> <i class="fa fa-user-plus"></i> </a>
                                            @elseif(\App\FriendRequest::where('sender', Auth::user()->id)->where('receiver', $comment->user_id)->exists())
                                                <i class="fa fa-hourglass-end pull-right"></i>
                                            @else
                                                <a class="pull-right" href="{{ route('profile.addFriend', $comment->user_id) }}"> <i class="fa fa-user-plus"></i> </a>
                                            @endif
                                        @else
                                            <i class="fa fa-check"></i>
                                        @endif
                                    @endif
								</span>
							</div>
							<div class="message-contents">
								{!! $comment->comment !!}
								@if($comment->author->signature != null)
									<hr>
									<div data-type="user-signature">
										<div class="text-center">
											<a href="{{ route('profile.details', $comment->author->username) }}" data-type="userlink">
												<img style="max-height: 200px;" src="{{ str_replace("?", "", route('home', $comment->author->signature->image)) }}" alt="">
											</a>
										</div>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>

                @endforeach

				<section class="row">
					<div class="small-16 columns">
						<!--PAGINATION-->
						<ul class="pagination">
							{!! $comments->render() !!}
						</ul>
						<!--//PAGINATION-->
					</div>
				</section>

                @if(\App\can('forum.comment'))
                    <div class="row">
                        <div class="small-16 large-16 columns callout">
                            <div id="note"></div>
                            <form method="post" action="{{ route('forums.posts.doCreate', [$forum->id, $topic->id]) }}">
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
                @endif

            </section>

        </div>

    </section>

@stop

@section('scripts')
    <script src="{{ asset('js/clipboard.min.js') }}"></script>
    <script>
        new Clipboard('.clipboard');
        function copied() {
            swal("Success!", "Your link was copied!", "success")
        }
    </script>
@stop