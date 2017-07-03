@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>404</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row">
            <div class="small-16 columns">
                <h3>Sorry Soldier!</h3>
                <h4>The page you tried to reach does not exist!</h4>
            </div>
        </div>

    </section>

@endsection
