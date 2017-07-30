@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <nav>
                    <h3>
                        {{ $game['NAME']->statsValue }}
                    </h3>
                    Players: {{ floor((0.01 * $game['B-U-percent_full']->statsValue) * $game['MAX-PLAYERS']->statsValue) }} / {{ $game['MAX-PLAYERS']->statsValue }}
                </nav>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            @foreach($playersByTeam as $team => $playerlist)
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
                        @forelse($playerlist as $player)
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
                                    <span style="line-height: 24px;">
                                        <img src="/images/flags-24/{{ $player['geoip']['iso_code'] }}.png" title="{{ $player['geoip']['city'] }}, {{ $player['geoip']['state_name'] }}, {{ $player['geoip']['country']}}" style="margin-top: -2px;" />
                                        {{ $player['P-ping']->statsValue }}ms
                                    </span>
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
            @endforeach
            <br syle="clear: both;" />
        </div>

    </section>

@endsection
