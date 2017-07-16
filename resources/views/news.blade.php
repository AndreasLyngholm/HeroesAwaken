@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

    <div class="row">
        <div class="small-16 columns">
            <h1>News</h1>
            <div class="big-sep"></div>
        </div>
    </div>
       
    <div class="row blog-entries">

        @foreach(\App\News::all()->sortByDesc('date') as $news)
            <!-- NEWS POST START -->
            <div class="small-16 large-16 columns">

                <article class="blog-entry row">
                    <div class="article-date small-16 medium-2 columns">
                        <div>
                            <p>{{ $news->date->format('M') }} <span class="day">{{ $news->date->format('d') }}</span> <span class="year">{{ $news->date->format('Y') }}</span></p>
                        </div>
                    </div>

                    <div class="article-content small-16 medium-14 columns">
                        <h3>{{ $news->title }}</h3>
                        {!! $news->text !!}
                    </div>
                </article>
            </div>

            <div class="row">
                <div class="small-16 columns">
                    <div class="big-sep"></div>
                </div>
            </div>

        @endforeach

      </div>

    </section>

@endsection
