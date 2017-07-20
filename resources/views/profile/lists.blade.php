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
        <div class="row collapse">
            <div class="small-2 columns">
                <ul id="admin-actions-tab" class="tabs vertical">
                    <li class="tabs-title is-active" role="presentation" >
                        <a id="friends-panel-label" href="#friends-panel" role="tab" aria-controls="friends-panel" aria-selected="true">Friend List</a>
                    </li>
                    <li class="tabs-title is-active" role="presentation" >
                        <a id="links-panel-label" href="#links-panel" role="tab" aria-controls="links-panel" aria-selected="false">Linked Accounts</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="avatar-panel-label" href="#avatar-panel" role="tab" aria-controls="avatar-panel" aria-selected="false">Avatar</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="signature-panel-label" href="#signature-panel" role="tab" aria-controls="signature-panel" aria-selected="false">Signature</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="description-panel-label" href="#description-panel" role="tab" aria-controls="description-panel" aria-selected="false">Description</a>
                    </li>
                </ul>
            </div>
            <div class="small-14 columns">
                <div class="tabs-content vertical" data-tabs-content="profile-actions-tab">
                    <div id="friends-panel" class="tabs-panel is-active" role="tabpanel" aria-hidden="false" aria-labelledby="friends-panel-label">
                        <div class="row">
                            <div class="small-8 columns">
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
                    </div>
                    <div id="links-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="links-panel-label">

                        <h2 class="title">Linked Accounts</h2>
                                                
                        <div class="row" style="margin-top: 10px;">
                            <div class="large-16 columns">
                                @if(Auth::user()->discordLink != null)
                                    <b>Discord</b> ID: {{ Auth::user()->discordLink->discord_id }}; {{ Auth::user()->discordLink->discord_name }}#{{ Auth::user()->discordLink->discord_discriminator }}
                                @else
                                    <a class="fa fa-link" href="{{ route('profile.linkDiscord') }}"> Link your discord account</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="avatar-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="avatar-panel-label">
                        <h2 class="title">Manage your avatar</h2>
                        <div class="row team" style="margin-bottom: 2rem;">
                            <div class="large-8 columns">
                                <p>Add your own personal avatar below.</p>
                                <p>We suggest images with the dimensions of 1:1 as we force the format after upload.</p>
                                <form action="{{ route('profile.addAvatar') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" name="image" required>
                                    <button type="submit" class="lime-button" style="float: left;">Submit Avatar</button>
                                </form>
                            </div>
                            @if(Auth::user()->avatar != null)
                                <div class="large-8 columns">
                                    <img src="{{ Auth::user()->avatar }}">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div id="signature-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="signature-panel-label">
                        <h2 class="title">Manage your signature</h2>
                        <div class="row team" style="margin-bottom: 2rem;">
                            <div class="large-8 columns">
                                <p>Add your own personal signature below.</p>
                                <p>We suggest images with the dimensions of 900 x 250px</p>
                                <form action="{{ route('profile.addSignature') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" name="image" required>
                                    <button type="submit" class="lime-button" style="float: left;">Submit Signature</button>
                                </form>
                            </div>
                            @if(Auth::user()->signature != null)
                                <div class="large-8 columns">
                                    <img src="{{ Auth::user()->signature->image }}">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div id="description-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="description-panel-label">
                        <h2 class="title">Manage your description</h2>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection