@if(Auth::check() && $user_id != Auth::id())
    @if(! Auth::user()->isFriend($user_id))
        @if(\App\FriendRequest::where('receiver', Auth::user()->id)->where('sender', $user_id)->exists())
            Answer Friend Request:
            <a style="cursor: pointer;" class="label success" href="{{ route('profile.answerFriendRequest', ['sender' => $user, 'answer' => 'accepted']) }}">
                <i class="fa fa-check"></i> Accept
            </a>
            <a style="cursor: pointer;" class="label alert" href="{{ route('profile.answerFriendRequest', ['sender' => $user, 'answer' => 'declined']) }}">
                <i class="fa fa-ban"></i> Decline
            </a>

        @elseif(\App\FriendRequest::where('sender', Auth::user()->id)->where('receiver', $user_id)->exists())
            Friend Request Sent <i class="fa fa-hourglass-end"></i>
        @else
            <a href="{{ route('profile.addFriend', $user_id) }}">Send Friend Request <i class="fa fa-user-plus"></i></a>
        @endif
    @else
            You are friends. <i class="fa fa-check"></i>
            <a style="cursor: pointer; background: #75302c; color: #c76c66" class="label alert" href="{{ route('profile.removeFriend', $user->id) }}"> @lang('profile.remove_friend')</a>
    @endif
@endif
