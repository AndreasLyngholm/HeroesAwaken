@extends('partials.layout')

@section('content')

    <section class="inner-slider">
      <div style="background: url('{{ asset('images/slider_small.png') }}')"></div>
    </section>

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>Register</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-16 large-8 columns">
                <form method="POST" action="{{ url('register') }}">
                    {{ csrf_field() }}
                    <label> Username
                        <input type="text" name="username" required>
                    </label>

                    <label> Email
                        <input type="email" name="email" required>
                    </label>

                    <label> Birthday
                        <input id="date" type="text" name="birthday" required>
                    </label>

                    <label> Password
                        <input type="password" name="password" required>
                    </label>

                    <button type="submit" class="lime-button" name="submit" style="float: right;">Register</button>
                </form>
                <div id="note"></div>
                <br><br>
                <br><br>
            </div>
            <div class="small-16 large-7 columns">
                <img src="{{ asset('images/join.png') }}" alt="" style="width: 50%;">
                <a href="{{ route('login') }}" class="lime-button">Login</a>
            </div>
        </div>

    </section>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#date').mask("99-99-9999",{placeholder:"dd-mm-yyyy"});
        });
    </script>
@stop
