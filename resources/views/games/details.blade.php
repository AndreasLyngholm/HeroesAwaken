@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <nav>
                    <h3>
                        Active Games
                    </h3>
                </nav>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <div style="float: left; width: 48%; margin-left: 1%; margin-right: 1%;">
                <table>
                    <thead>
                    <tr>
                        <th>Hero Name</th>
                        <th>Level</th>
                        <th>Score</th>
                        <th>Kills</th>
                        <th>Time</th>
                        <th>Ping</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{--<tr class="forum-category">--}}
                            {{--<td colspan="5">Official Threads</td>--}}
                        {{--</tr>--}}
                        @forelse($playersByTeam['team1'] as $player)
                            <tr>
                                <td style="width: 33%">
                                    <a href="/profile/{{ $player['user']['username'] }}">
                                        {{ $player['hero']['heroName'] }}
                                    </a>
                                </td>
                                <td>
                                    {{ $player['P-level']->statsValue }}
                                </td>
                                <td>
                                    {{ $player['P-score']->statsValue }}
                                </td>
                                <td>
                                    {{ $player['P-kills']->statsValue }}
                                </td>
                                <td>
                                    {{ $player['P-time']->statsValue }}
                                </td>
                                <td>
                                    {{ $player['P-ping']->statsValue }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Players</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div style="float: left; width: 48%; margin-left: 1%; margin-right: 1%;">
                <table>
                    <thead>
                    <tr>
                        <th>Hero Name</th>
                        <th>Level</th>
                        <th>Score</th>
                        <th>Kills</th>
                        <th>Time</th>
                        <th>Ping</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($playersByTeam['team2'] as $player)
                            <tr>
                                <td style="width: 33%">
                                    <a href="/profile/{{ $player['user']['username'] }}">
                                        {{ $player['hero']['heroName'] }}
                                    </a>
                                </td>
                                <td>
                                    {{ $player['P-level']->statsValue }}
                                </td>
                                <td>
                                    {{ $player['P-score']->statsValue }}
                                </td>
                                <td>
                                    {{ $player['P-kills']->statsValue }}
                                </td>
                                <td>
                                    {{ $player['P-time']->statsValue }}
                                </td>
                                <td>
                                    {{ $player['P-ping']->statsValue }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Players</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <br syle="clear: both;" />
        </div>

    </section>

@endsection
