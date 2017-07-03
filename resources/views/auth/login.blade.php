@extends('partials.layout')

@section('content')

    <section class="inner-slider">
      <div style="background: url('{{ asset('images/slider_small.png') }}')"></div>
    </section>

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>Login</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-16 large-8 columns">
                <div id="note"></div>
                <form method="POST" action="{{ url('login') }}">
                    {{ csrf_field() }}
                    <label> Email
                        <input type="email" name="email">
                    </label>

                    <label> Password
                        <input type="password" name="password">
                    </label>

                    <button type="submit" class="lime-button" name="submit" style="float: right;">Login</button>
                    <a href="#">Forgot password?</a>
                </form>
                @if ($errors->has('email'))
                    <div class="alert callout" data-closable style="margin-top: 50px;">
                        <h5>ooops!!</h5>
                        <p style="color: #fff;">Hey soldier! Wrong password or email. Try again!</p>
                        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif($errors->has('password'))
                <div class="alert callout" data-closable style="margin-top: 50px;">
                    <h5>ooops!!</h5>
                    <p style="color: #fff;">Hey soldier! Wrong password or email. Try again!</p>
                    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="small-16 large-6 columns">
                <a href="{{ route('register') }}"><img src="{{ asset('images/register.png') }}" alt="" style="width: 50%;"></a>
            </div>
        </div>

    </section>

@endsection
