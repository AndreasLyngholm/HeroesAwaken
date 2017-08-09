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
							<a href="{{ route('forums.lists') }}">@lang('layout.forum')</a>
							/
							<a href="{{ route('forums.details', $forum->id) }}">@lang('forum.' . strtolower($forum->name))</a>
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
				<div class="post start callout-primary">
					<div class="post-contents">
						<div class="user callout-secondary">
							<div class="username"><a href="{{ route('profile.details', $topic->author->username) }}" data-toggle="popover" class="user-hovercard" data-placement="bottom" data-user-id="2">{{ \App\User::find($topic->user_id)->username }}</a></div>
							<div class="avatar-holder">
								@if($topic->author->avatar != null)
									<img class="avatar" src="{{ str_replace("?", "", route('home', $topic->author->avatar)) }}">
								@else
									<img class="avatar" src="{{ asset('images/placeholders/comment.png') }}">
								@endif
							</div>
							<div class="user-info">
								<div class="tag">
									{{ $topic->author->roles->last()->title }}
								</div>
								<table class="stats">
									<tbody>
										<tr class="joindate">
											<td>@lang('forum.member_since')</td>
											<td>{{ $topic->author->created_at->format('d-m-Y') }}</td>
										</tr>
										<tr class="posts">
											<td>@lang('forum.comments')</td>
											<td>{{ $topic->author->comments()->count() }}</td>
										</tr>
										<tr class="heroes">
											<td>@lang('forum.heroes')</td>
											<td>{{ $topic->author->heroes->count() }}</td>
										<tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="message">
							<div class="header callout-secondary">
								<span data-type="datetime">{{ $topic->created_at }}</span>
								<span class="editing">
									|
									<a onclick="copied()" class="clipboard" data-clipboard-text="{{ URL::current() }}#{{ 0 }}"> <i class="fa fa-link"></i> </a>
									@include('partials.addFriend', ['user_id' => $topic->user_id])
									@if(Auth::check())
										@if(\App\can('forum.delete') || $topic->user_id == Auth::id())
											| <a href="{{ route('forums.topicDelete', $topic->id) }}"><i class="fa fa-times"></i></a>
										@endif
									@endif
								</span>
							</div>
							<div class="content">
								{!! $topic->text !!}
							</div>
							@if(\App\User::find($topic->user_id)->signature != null)
								<hr>
								<div class="signature">
									<a href="{{ route('profile.details', \App\User::find($topic->user_id)->username) }}" data-type="userlink">
										<img style="max-height: 200px;" src="{{ str_replace("?", "", route('home', App\User::find($topic->user_id)->signature->image)) }}" alt="">
									</a>
								</div>
							@endif
						</div>
					</div>
				</div>

				@foreach($comments as $comment)
					<div class="post callout-primary" id="0">
						<div class="post-contents">
							<div class="user callout-secondary">
								<div class="username">
									<a href="{{ route('profile.details', $comment->author->username) }}" data-toggle="popover" class="user-hovercard" data-placement="bottom" data-user-id="2"> {{ $comment->author->username }}</a>
								</div>
								<div class="avatar-holder">
									@if($comment->author->avatar != null)
										<img class="avatar" src="{{ str_replace("?", "", route('home', $comment->author->avatar)) }}">
									@else
										<img class="avatar" src="{{ asset('images/placeholders/comment.png') }}">
									@endif
								</div>
								<div class="user-info">
									<div class="tag">
                                        {{ $comment->author->roles->last()->title }}
									</div>
									<table class="stats">
										<tbody>
										<tr>
											<td>@lang('forum.member_since')</td>
											<td>{{ $comment->author->created_at->format('d-m-Y') }}</td>
										</tr>
										<tr>
											<td>@lang('forum.comments')</td>
											<td>{{ $comment->author->comments()->count() }}</td>
										</tr>
										<tr>
											<td>@lang('forum.heroes')</td>
											<td>{{ $comment->author->heroes->count() }}</td>
										<tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="message">
								<div class="header callout-secondary">
									<span data-type="datetime">{{ $comment->created_at }}</span>
									<span class="editing">
										|
										<a onclick="copied()" class="clipboard" data-clipboard-text="{{ URL::current() }}#{{ $comment->id }}"> <i class="fa fa-link"></i> </a>
										@if(Auth::check() && $comment->user_id != Auth::id())
											|
											@if(! Auth::user()->isFriend($comment->user_id))
												@if(\App\FriendRequest::where('receiver', Auth::user()->id)->where('sender', $comment->user_id)->exists())
													<a href="{{ route('profile.addFriend', $comment->user_id) }}"> <i class="fa fa-user-plus"></i> </a>
												@elseif(\App\FriendRequest::where('sender', Auth::user()->id)->where('receiver', $comment->user_id)->exists())
													<i class="fa fa-hourglass-end"></i>
												@else
													<a href="{{ route('profile.addFriend', $comment->user_id) }}"> <i class="fa fa-user-plus"></i> </a>
												@endif
											@else
												<i class="fa fa-check"></i>
											@endif
										@endif
										@if(Auth::check())
											@if(\App\can('forum.delete') || $comment->user_id == Auth::id())
												| <a href="{{ route('forums.commentDelete', $comment->id) }}"><i class="fa fa-times"></i></a>
											@endif
										@endif
									</span>
								</div>
								<div class="content">
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
								<label> <b style="color: black;">@lang('forum.write_comment')</b>
									<textarea name="comment" id="editor1" rows="5" cols="40" placeholder="What do you have on your mind?"  required></textarea>
								</label>
								<br>
								<button type="submit" class="lime-button" name="submit" style="float: right;">@lang('forum.add_comment')</button>
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
