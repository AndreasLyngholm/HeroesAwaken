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


            <div style="background-color: rgba(255, 255, 255, 0.15)">
                <div style="padding: 16px;">
                    <form method="POST" action="/games">
                        {{ csrf_field() }}
                        <select name="region" style="width: 50%; float: left; margin-bottom: 0px;">
                            <option value="AUTO" {{ ($selectedregion == '') ? 'selected' : '' }}>Automatic</option>
                            <option value="EU" {{ ($selectedregion == 'EU') ? 'selected' : '' }}>Europe</option>
                            <option value="NA" {{ ($selectedregion == 'NA') ? 'selected' : '' }}>North America</option>
                        </select>
                        <input type="submit" class="lime-button" style="height: 48px; width: 48%; margin-left: 1%; float: left; line-height: 24px;" value="Change Preferred Region" />
                        <br style="clear: both;" />
                    </form>
                </div>
            </div>


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
                                <p style="margin-bottom: 0rem;">
                                    <a href="/games/{{ $gid }}">
                                        {{ $game['NAME']->statsValue }}
                                    </a>
                                </p>
                            </td>
                            <td>
                                {{ ceil((0.01 * $game['B-U-percent_full']->statsValue) * $game['MAX-PLAYERS']->statsValue) }} / {{ $game['MAX-PLAYERS']->statsValue }}
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
