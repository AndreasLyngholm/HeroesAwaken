@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>@lang('contact.get_in_touch')</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-16 large-8 columns">
                <h4>@lang('contact.how_to')</h4>
                <p>@lang('contact.how_to_description')</p>
                <p>@lang('contact.no_email_or_phone')</p>
            </div>
            <div class="small-16 large-7 columns">
                <div class="row small-up-1 medium-up-2">
                    <h4>@lang('contact.to_contact')</h4>
                    <!--address-->
                    <div class="column">
                        <h5>AwokenLead</h5>
                        <address>
                            <p>
                                MakaHost<br>
                                Lyngholm<br>
                                Crowscream<br>
                                Spencer<br>
                            </p>
                        </address>
                    </div>
                    <!--//address-->
                    <!--address-->
                    <div class="column">
                        <h5>Staff</h5>
                        <address>
                            <p>
                                Absent<br> 
                                Snow<br>
                                Ray<br>
                            </p>
                        </address>
                    </div>
                    <!--//address-->
                    <!--address-->
                    <div class="column">
                        <h5>AwokenDevs</h5>
                        <address>
                            <p>
                                Wazz<br>
                                Lord Squirrel<br>
                                Jefalo<br>
                                Lars.n7<br>
                                Warpy<br>
                            </p>
                        </address>
                    </div>
                    <!--//address-->
                     <!--address-->
                    <div class="column">
                        <h5>Community Managers</h5>
                        <address>
                            <p>
                                DraksTOP<br>
                                LordHardness_<br>
                                MeanSpeed<br>
                                Pasolero<br>
                                BFHPTPIRATE<br>
                            </p>
                        </address>
                    </div>
                    <!--//address-->
                </div>
            </div>
        </div>

    </section>

@endsection
