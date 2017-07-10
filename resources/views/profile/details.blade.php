@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>{{ $user->username }}</h1>
                <!-- MAKE BIGGER!! -->
                <a class="pull-right" href="{{ route('profile.addFriend', $user->id) }}"><i class="fa fa-user-plus"></i></a>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row team" style="margin-bottom: 5rem;">
            <div class="large-16 columns">
                <!-- WE WANT -->
                <!-- Stats from in-game -->
                <!-- K/D/A -->
                <!-- Each map. Hours / Numbers / Win/Lose Ratio -->
                <!-- Add friend -->
                <!-- PM -->
                <!-- Numbers of posts / Comments -->

                <h3>Description</h3>
                {!! $user->description != null ? $user->description : 'This soldier has no description yet!' !!}

            </div>
            @if($user->signature != null)
                <div class="large-16 columns">
                    <img src="{{ $user->signature->image }}">
                </div>
            @endif
        </div>

    </section>

@stop