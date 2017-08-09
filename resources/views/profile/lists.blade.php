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
                    @if(\App\can('game.createhero'))
                        <li class="tabs-title is-active" role="presentation" style="background-color: #8AB15F">
                            <a href="{{ route('profile.createHero') }}" role="tab" aria-selected="false">Create Hero</a>
                        </li>
                    @endif
                    <li class="tabs-title is-active" role="presentation" >
                        <a id="friends-panel-label" href="#friends-panel" role="tab" aria-controls="friends-panel" aria-selected="true">@lang('profile.friend_list')</a>
                    </li>
                    <li class="tabs-title is-active" role="presentation" >
                        <a id="links-panel-label" href="#links-panel" role="tab" aria-controls="links-panel" aria-selected="false">@lang('profile.linked_accounts')</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="avatar-panel-label" href="#avatar-panel" role="tab" aria-controls="avatar-panel" aria-selected="false">@lang('profile.avatar.title')</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="signature-panel-label" href="#signature-panel" role="tab" aria-controls="signature-panel" aria-selected="false">@lang('profile.signature.title')</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="description-panel-label" href="#description-panel" role="tab" aria-controls="description-panel" aria-selected="false">@lang('profile.description.title')</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="change-password-panel-label" href="#change-password-panel" role="tab" aria-controls="change-password-panel" aria-selected="false">@lang('profile.change_password')</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="language-panel-label" href="#language-panel" role="tab" aria-controls="language-panel" aria-selected="false">@lang('profile.change_language')</a>
                    </li>
                </ul>
            </div>
            <div class="small-14 columns">
                <div class="tabs-content vertical" data-tabs-content="profile-actions-tab">
                    <div id="friends-panel" class="tabs-panel is-active" role="tabpanel" aria-hidden="false" aria-labelledby="friends-panel-label">
                        <div class="row">
                            <div class="small-8 columns">
                                <h2>@lang('profile.friend_list')</h2>
                                <table>
                                    <thead>
                                    <tr>
                                        <th>@lang('profile.username')</th>
                                        <th>@lang('profile.status')</th>
                                        <th>@lang('profile.options')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($friends as $friend)
                                        <tr>
                                            <td><a style="color: black; font-weight: bolder;" href="{{ route('profile.details', $friend->username) }}">{{ $friend->username }}</a></td>
                                            <td>{!! $friend->isOnline() ? "<i class='label success'>ONLINE</i>" : "<i class='label alert'>OFFLINE</i>" !!}</td>
                                            <td><a class="button warning" href="{{ route('profile.removeFriend', $friend->id) }}"><i class="fa fa-times"></i> @lang('profile.remove_friend')</a></td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            @if(Auth::user()->friendRequests()->count() > 0)
                            <div class="large-8 columns">
                                <h2>@lang('profile.friend_requests')</h2>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td width="50%">
                                            <a style="cursor: pointer;" class="label success" href="{{ route('profile.answerAll', ['answer' => 'accepted']) }}">
                                                <i class="fa fa-check"></i> Accept all requests
                                            </a>
                                        <td width="50%">
                                            <a style="cursor: pointer;" class="label alert" href="{{ route('profile.answerAll', ['answer' => 'declined']) }}">
                                                <i class="fa fa-ban"></i> Decline all requests
                                            </a></td>
                                        </td>
                                    </tr>
                                    @foreach(Auth::user()->friendRequests as $request)
                                    <tr>
                                        <td width="70%;">
                                            @lang('profile.pending_request') <a style="color: black; font-weight: bolder;" href="{{ route('profile.details', App\User::find($request->sender)->username) }}">{{ App\User::find($request->sender)->username }}</a>
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

                        <h2 class="title">@lang('profile.linked_accounts')</h2>
                        <hr>
                        <div style="margin-top: 10px;">
                            <div style="width: 120px; height: 58px; font-size: 12px;">
                                <a href="https://discord.com" target="_blank" style="color: #777;">
                                    <img src="/images/links/discord.png" />
                                    <span style="padding-left: 18px;">
                                        www.discord.com
                                    </span>
                                </a>
                            </div>
                            <div style="line-height: 32px; padding-left: 12px;">
                                @if(Auth::user()->discordLink != null)
                                    Account:
                                    <span style="font-size: 18px;">
                                        {{ Auth::user()->discordLink->discord_name }}
                                        @if(Auth::user()->discordLink->discord_discriminator != null)
                                            #{{ Auth::user()->discordLink->discord_discriminator }}
                                        @endif
                                    </span>
                                    <br>
                                    <a href="{{ route('profile.linkDiscord') }}"><i class="fa fa-link"></i> Refresh</a>
                                @else
                                    <a href="{{ route('profile.linkDiscord') }}"><i class="fa fa-link"></i> Link your Discord (discord.com) Account!</a>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div style="margin-top: 10px;">
                            <div style="width: 120px; height: 58px; font-size: 12px;">
                                <a href="https://battlelog.co" target="_blank" style="padding-top: 8px; color: #777;">
                                    <img src="/images/links/revive.png" />
                                    <span style="padding-left: 18px;">
                                        www.battlelog.co
                                    </span>
                                </a>
                            </div>
                            <div style="line-height: 32px; padding-left: 12px;">
                                @if(Auth::user()->reviveLink != null)
                                    Account:
                                    <a style="font-size: 18px;" href="https://battlelog.co/bfhq.php?id={{ Auth::user()->reviveLink->revive_id }}" target="_blank">{{ Auth::user()->reviveLink->revive_name }}
                                    <br>
                                    <a href="{{ route('profile.linkRevive') }}"><i class="fa fa-link"></i> Refresh</a>
                                @else
                                    <a href="{{ route('profile.linkRevive') }}"><i class="fa fa-link"></i> Link your Revive Network (battlelog.co) Account!</a>
                                @endif
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div id="avatar-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="avatar-panel-label">
                        <h2 class="title">@lang('profile.avatar.manage')</h2>
                        <div class="row team" style="margin-bottom: 2rem;">
                            <div class="large-8 columns">
                                <p>@lang('profile.avatar.below_1')</p>
                                <p>@lang('profile.avatar.below_2')</p>
                                <form action="{{ route('profile.addAvatar') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" name="image" required>
                                    <button type="submit" class="lime-button" style="float: left;">@lang('profile.avatar.submit')</button>
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
                        <h2 class="title">@lang('profile.signature.manage')</h2>
                        <div class="row team" style="margin-bottom: 2rem;">
                            <div class="large-8 columns">
                                <p>@lang('profile.signature.below_1')</p>
                                <p>@lang('profile.signature.below_2')</p>
                                <form action="{{ route('profile.addSignature') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" name="image" required>
                                    <button type="submit" class="lime-button" style="float: left;">@lang('profile.signature.submit')</button>
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
                        <h2 class="title">@lang('profile.description.manage')</h2>
                        <div class="row" style="margin-bottom: 2rem;">
                            <div class="large-8 columns">
                                <form method="post" action="{{ route('profile.addDescription') }}">
                                    {{ csrf_field() }}
                                    <label> <b style="color: black;"></b>
                                        <textarea name="description" id="editor1" rows="5" cols="40" placeholder="What do you have on your mind?" required></textarea>
                                    </label>
                                    <br>
                                    <button type="submit" class="lime-button" name="submit" style="float: left;">@lang('profile.description.submit')</button>
                                    <script>
                                        CKEDITOR.replace( 'editor1', {
                                            uiColor: '#E2D3C0',
                                            removeButtons: 'Source'
                                        });
                                    </script>
                                </form>
                            </div>
                            <div class="large-8 columns">
                                {!! Auth::user()->description !!}
                            </div>
                        </div>
                    </div>

                    <div id="change-password-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="description-panel-label">
                        <h2 class="title">@lang('profile.change_password')</h2>
                        <div class="row" style="margin-bottom: 2rem;">
                            <div class="large-8 columns">
                                <form method="post" action="{{ route('profile.changePassword') }}">
                                    {{ csrf_field() }}
                                    <label> @lang('profile.current_password') <b style="color: black;"></b>
                                        <input type="password" name="current_password" required>
                                    </label>

                                    <label> @lang('profile.new_password') <b style="color: black;"></b>
                                        <input type="password" name="new_password" required>
                                    </label>

                                    <label> @lang('profile.new_password_confirmed') <b style="color: black;"></b>
                                        <input type="password" name="new_password_confirmed" required>
                                    </label>

                                    <button type="submit" class="lime-button" name="submit" style="float: left;">@lang('profile.change_password')</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="language-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="language-panel-label">
                        <h2 class="title">@lang('profile.change_language')</h2>
                        <div class="row" style="margin-bottom: 2rem;">
                            <div class="large-8 columns">
                                <form method="post" action="{{ route('setLanguage') }}">
                                    {{ csrf_field() }}
                                    <label>  <b style="color: black;"></b>
                                        <select name="language" class="select2">
                                            <option {{ Session::get('locale') == 'en' ? 'selected' : '' }} value="en">English</option>
                                            <option {{ Session::get('locale') == 'da' ? 'selected' : '' }} value="da">Danish</option>
                                            <!-- <option {{ Session::get('locale') == 'fr' ? 'selected' : '' }} value="fr">French</option> !-->
                                            <option {{ Session::get('locale') == 'se' ? 'selected' : '' }} value="se">Swedish</option>
                                            <option {{ Session::get('locale') == 'de' ? 'selected' : '' }} value="de">German</option>
                                            <option {{ Session::get('locale') == 'nl' ? 'selected' : '' }} value="nl">Dutch</option>
                                            <option {{ Session::get('locale') == 'es' ? 'selected' : '' }} value="es">Spanish</option>
                                            <option {{ Session::get('locale') == 'pl' ? 'selected' : '' }} value="pl">Polish</option>
                                            <option {{ Session::get('locale') == 'ru' ? 'selected' : '' }} value="ru">Russian</option>
                                            <option {{ Session::get('locale') == 'fi' ? 'selected' : '' }} value="fi">Finnish</option>
                                            <option {{ Session::get('locale') == 'tr' ? 'selected' : '' }} value="tr">Turkish</option>
                                            <option {{ Session::get('locale') == 'po' ? 'selected' : '' }} value="po">Portuguese</option>
                                        </select>
                                    </label>
                                    <button type="submit" class="lime-button" name="submit" style="float: left;">@lang('profile.change_language')</button>
                                </form>
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
