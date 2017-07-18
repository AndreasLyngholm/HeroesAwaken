@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>{{ Auth::user()->username }}</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row team" style="margin-bottom: 2rem;">
            
            <div class="large-8 columns">
		<h2>Friend list</h2>
                <table>
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($friends as $friend)
                        <tr>
                            <td><a style="color: black; font-weight: bolder;" href="{{ route('profile.details', $friend->username) }}">{{ $friend->username }}</a></td>
                            <td>{!! $friend->isOnline() ? "<i class='label success'>ONLINE</i>" : "<i class='label alert'>OFFLINE</i>" !!}</td>
                            <td><a class="button warning" href="{{ route('profile.removeFriend', $friend->id) }}"><i class="fa fa-times"></i> Remove friend</a></td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div> 
	    
	    @if(Auth::user()->friendRequests()->count() > 0)
	    <div class="large-8 columns">
                <h2>Friend requests</h2>
		<table>
		    <tbody>
			@foreach(Auth::user()->friendRequests as $request)                  
			<tr>
			    <td width="70%;">
			    You have a pending friend request from <a style="color: black; font-weight: bolder;" href="{{ route('profile.details', App\User::find($request->sender)->username) }}">{{ App\User::find($request->sender)->username }}</a>
			    </td>
			    <td width="30%;">
			    	<a style="cursor: pointer;" class="label success" href="{{ route('profile.answerFriendRequest', ['sender' => $request->sender, 'answer' => 'accepted']) }}">
                        <i class="fa fa-check"></i> Accept
                    </a>
                    <a style="cursor: pointer;" class="label alert" href="{{ route('profile.answerFriendRequest', ['sender' => $request->sender, 'answer' => 'declined']) }}">
                        <i class="fa fa-ban"></i> Decline
                    </a>
			    </td>
			</tr>
			@endforeach
		    </tbody>
		</table>
	    </div>
	    @endif
        </div>

        <div class="row team" style="margin-bottom: 2rem;">
            <div class="large-8 columns">
                <p>Add your own personal signature below.</p>
                <p>We suggest images with the dimensions of 900 x 250px</p>
                <form action="{{ route('profile.addSignature') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="image" required>
                    <button type="submit" class="lime-button" style="float: left;">Submit image</button>
                </form>
            </div>
            @if(Auth::user()->signature != null)
                <div class="large-8 columns">
                    <img src="{{ Auth::user()->signature->image }}">
                </div>
            @endif
        </div>

        <div class="row" style="margin-bottom: 2rem;">
            <div class="large-8 columns">
                <form method="post" action="{{ route('profile.addDescription') }}">
                    {{ csrf_field() }}
                    <label> <b style="color: black;"></b>
                        <textarea name="description" id="editor1" rows="5" cols="40" placeholder="What do you have on your mind?" required></textarea>
                    </label>
                    <br>
                    <button type="submit" class="lime-button" name="submit" style="float: left;">Add description</button>
                    <script>
                        CKEDITOR.replace( 'editor1', {
                            uiColor: '#E2D3C0'
                        });
                    </script>
                </form>
            </div>
            <div class="large-8 columns">
                {!! Auth::user()->description !!}
            </div>
        </div>

    </section>

@stop
