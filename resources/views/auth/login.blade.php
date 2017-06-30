@extends('partials.layout')

@section('content')

    <section id="main-content" style="margin-top: 50px;">

        <div class="row">
            <div class="small-16 columns">
                <h1>Login</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-16 large-8 columns">
                <form method="POST" action="{{ url('login') }}" id="ajax-contact-form">
                    {{ csrf_field() }}
                    <label> Email
                        <input type="email" name="email">
                    </label>

                    <label> Password
                        <input type="password" name="password">
                    </label>

                    <button type="submit" class="lime-button" name="submit">Login</button>
                    <a href="#">Forgot password?</a>
                </form>
                <div id="note"></div>
            </div>
            <div class="small-16 large-7 columns">
                <img src="{{ asset('images/join.png') }}" alt="" style="width: 50%;">
                <a href="{{ route('register') }}" class="lime-button">Join us!</a>
            </div>
        </div>

    </section>

@endsection