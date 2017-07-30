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
            <table>
                <thead>
                <tr>
                    <th>Hostname</th>
                    <th>Players</th>
                    <th>Map</th>
                    <th>Region</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($activegames as $gid => $game)

                        <tr>
                            <td style="width:75%">
                                <a href="/games/{{ $gid }}">
                                    {{ $game['NAME']->statsValue }}
                                </a>
                            </td>
                            <td>
                                {{ floor((0.01 * $game['B-U-percent_full']->statsValue) * $game['MAX-PLAYERS']->statsValue) }} / {{ $game['MAX-PLAYERS']->statsValue }}
                            </td>
                            <td>
                                {{ $game['B-U-map_name']->statsValue }}
                            </td>
                            <td>
                                <img src="/images/flags-24/{{ $game['geoip']['iso_code'] }}.png" title="{{ $game['geoip']['city'] }}, {{ $game['geoip']['state_name'] }}, {{ $game['geoip']['country']}}" style="margin-top: -2px;" />
                                {{ $game['geoip']['continent'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

@endsection
