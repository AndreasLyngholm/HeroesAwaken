@extends('partials.layout')

@section('content')

-    <section class="inner-slider">
 -      <div style="background: url('{{ asset('images/404_slider.png') }}')"></div>
 -    </section>
 
    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="large-16 columns">
                <h1 style="text-align: center;">404</h1>
                <h3 style="text-align: center;">The page you tried to visit does not exist!</h3>
            </div>
            <div class="clearfix"></div>
            <div class="large-16 columns">
                <img class="float-center" src="{{ asset('images/error.png') }}">
            </div>
        </div>

    </section>

@endsection
