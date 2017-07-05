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

        <div class="row team" style="margin-bottom: 2rem;">
            <div class="large-8 columns">
                <p>Add your own personal signature below.</p>
                <p>We suggest images with the dimensions of 900 x 250px</p>
                <form action="{{ route('profile.addSignature') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="image" required>
                    <button type="submit" class="lime-button" style="float: left;">Submit image</button>
                </form>
            </div>
            @if(Auth::user()->signature != null)
                <div class="large-8 columns">
                    <img src="{{ Auth::user()->signature->image }}">
                </div>
            @endif
        </div>

        <div class="row" style="margin-bottom: 2rem;">
            <div class="large-8 columns">
                <form method="post" action="{{ route('profile.addDescription') }}">
                    {{ csrf_field() }}
                    <label> <b style="color: black;"></b>
                        <textarea name="description" id="editor1" rows="5" cols="40" placeholder="What do you have on your mind?" required></textarea>
                    </label>
                    <br>
                    <button type="submit" class="lime-button" name="submit" style="float: left;">Add description</button>
                    <script>
                        CKEDITOR.replace( 'editor1', {
                            uiColor: '#E2D3C0'
                        });
                    </script>
                </form>
            </div>
            <div class="large-8 columns">
                {!! Auth::user()->description !!}
            </div>
        </div>

    </section>

@stop