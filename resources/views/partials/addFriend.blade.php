@if(Auth::check() && $user_id != Auth::id())
    |
    @if(! Auth::user()->isFriend($user_id))
        @if(\App\FriendRequest::where('receiver', Auth::user()->id)->where('sender', $user_id)->exists())
            <a class="pull-right" href="{{ route('profile.addFriend', $user_id) }}"> <i class="fa fa-user-plus"></i> </a>
        @endif
    @else
        <i class="fa fa-check"></i>
    @endif
@endif