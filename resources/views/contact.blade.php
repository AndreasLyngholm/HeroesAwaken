@extends('partials.layout')

@section('content')

    <section class="inner-slider">
      <div style="background: url('{{ asset('images/slider_bg.png') }}')"></div>
    </section>

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>Get in Touch!</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-16 large-8 columns">
                <h4>How to get in touch</h4>
                <p>If you have any bugs reports, any questions, or just want to become a part of our community, just can reach us on our
                    <a href="https://discordapp.com/invite/WhK8RgX">Discord channel</a>
                    or
                    <a href="https://www.facebook.com/Heroes-Awaken-197852317403720/?fref=ts">Facebook page</a>!
                    
                </p>
                <p>
                    We do not have any official Email and Telephone you can contact at the moment.
                </p>
            </div>
            <div class="small-16 large-7 columns">
                <div class="row small-up-1 medium-up-2">
                    <h4>People to contact</h4>
                    <!--address-->
                    <div class="column">
                        <h5>Staff</h5>
                        <address>
                            <p>
                                MakaHost<br>
                                Absent<br>
                                Doge :-)<br>
                                Synaxis<br>
                                Ray<br>
                                Warp Productions<br>
                                Heax<br>
                            </p>
                        </address>
                    </div>
                    <!--//address-->
                    <!--address-->
                    <div class="column">
                        <h5>Devs</h5>
                        <address>
                            <p>
                                Lyngholm<br>
                                Wazz<br>
                                SD149<br>
                                Snow<br>
                                Vahdek<br>
                            </p>
                        </address>
                    </div>
                    <!--//address-->
                </div>
            </div>
        </div>

    </section>

@endsection
