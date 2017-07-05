@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>{{ Auth::user()->username }}</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row team" style="margin-bottom: 5rem;">
            <div class="large-6 columns">
                <p>Add your own personal signature below.</p>
                <p>We suggest images with the dimensions of 900 x 250px</p>
                <form action="{{ route('profile.addSignature') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="image" required>
                    <input type="submit" value="Submit image" class="lime-button">
                </form>
            </div>
            @if(Auth::user()->signature != null)
                <div class="large-10 columns">
                    <img src="{{ Auth::user()->signature->image }}">
                </div>
            @endif
        </div>

    </section>

@stop