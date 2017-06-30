@extends('partials.layout')

@section('content')

    <section id="main-content" style="margin-top: 50px;">

        <div class="row">
            <div class="small-16 columns">
                <h1>Get in Touch!</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-16 large-8 columns">
                <form id="ajax-contact-form">
                    <label>
                        <input type="text" placeholder="Your Name" name="name">
                    </label>

                    <label>
                        <input type="text" placeholder="Your e-Mail" name="email">
                    </label>

                    <label>
                        <textarea name="message" rows="8" cols="40" placeholder="What up?"></textarea>
                    </label>

                    <button type="submit" class="lime-button" name="submit">Send</button>
                </form>
                <div id="note"></div>
            </div>
            <div class="small-16 large-7 columns addresses">
                <div class="row small-up-1 medium-up-2">
                    <!--address-->
                    <div class="column">
                        <h5>Headquarters</h5>
                        <address>
                            <p>
                                GAMEDEVS - LOCATION - LC <br>
                                LandLand 669, PT <br>
                                <a href="tel:+9067649321">T: 9067649321</a> <br>
                                <a href="tel:+6732643887-1">F: 6732643887-1</a>
                            </p>
                        </address>
                    </div>
                    <!--//address-->
                    <!--address-->
                    <div class="column">
                        <h5>Europe</h5>
                        <address>
                            <p>
                                GAMEDEVS - LOCATION - LC <br>
                                LandLand 669, PT <br>
                                <a href="tel:+9067649321">T: 9067649321</a> <br>
                                <a href="tel:+6732643887-1">F: 6732643887-1</a>
                            </p>
                        </address>
                    </div>
                    <!--//address-->
                    <!--address-->
                    <div class="column">
                        <h5>Office 1</h5>
                        <address>
                            <p>
                                GAMEDEVS - LOCATION - LC <br>
                                LandLand 669, PT <br>
                                <a href="tel:+9067649321">T: 9067649321</a> <br>
                                <a href="tel:+6732643887-1">F: 6732643887-1</a>
                            </p>
                        </address>
                    </div>
                    <!--//address-->
                    <!--address-->
                    <div class="column">
                        <h5>Alternate Contact</h5>
                        <address>
                            <p>
                                GAMEDEVS - LOCATION - LC <br>
                                LandLand 669, PT <br>
                                <a href="mailto:mail@mail.com">mail@mail.com</a><br>
                            </p>
                        </address>
                    </div>
                    <!--//address-->
                </div>
            </div>
        </div>

    </section>

@endsection