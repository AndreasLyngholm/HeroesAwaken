<!-- THIS IS THE HOMEPAGE -->
<!-- ALL CSS SHOULD ADDED TO public/css/* -->
<!-- Let me know if you have any questions -->
<!-- // Lyngholm -->

@extends('partials.layout')

@section('content')

    <section id="home-slider">
        <!--slide 1-->
        <div style="background: url({{ asset('images/slider_.png') }})">
        </div>
        <!--//slide 1-->
        <!--slide-2-->
    {{--<div style="background: url({{ asset('images/placeholders/slider_2.jpg') }})">--}}
    {{--<div class="row">--}}
    {{--<div class="small-16 columns">--}}
    {{--<div class="cta-text">--}}
    {{--<p> <span>X Game Update!</span></p>--}}
    {{--<p> <span>Lorem Ipsum is simply</span></p>--}}
    {{--<p> <span>dummy text!</span></p><a href="#" class="button cta-button">Try the Demo! <span>for Windows</span></a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!--//slide-2-->
        <!--slide 3-->
    {{--<div style="background: url({{ asset('images/placeholders/slider_3.jpg') }})">--}}
    {{--<div class="row">--}}
    {{--<div class="small-16 columns">--}}
    {{--<div class="cta-text">--}}
    {{--<p> <span>New Game on The Way!</span></p>--}}
    {{--<p> <span>Lorem Ipsum is simply</span></p>--}}
    {{--<p> <span>dummy text!</span></p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!--//slide-3-->
    </section>

    <div class="content-top" style="background: url({{ asset('images/backgrounds/bg-body-top.png') }}) repeat-x center top;"></div>

    <section id="main-content">
        <div class="row">
            <div class="small-16 columns">
                <article class="about-us-summary">
                    <h2>The Heroes Awaken project</h2>
                    <p>
                      The Heroes Awaken project started with a little boys childhood that got ruined when EA closed their servers for Battlefield Heroes 2015-07-14. Makahost saw this opportunity to prove his love towards people whos childhood was to play Battlefield Heroes. After some trouble with the project, Makahost joined Revive Network in hope of help with his project. Things did not turn out well and Makahost decided to finish the game on his own and this community is now called Heroes Awaken and is now being developed by a team of geeks.
                    </p>
                </article>
            </div>
        </div>

        {{--<div class="row">--}}
            {{--<div class="small-16 columns">--}}
                {{--<div class="big-sep"></div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="row">--}}

            {{--<div id="featured-games" class="small-16 large-9 columns">--}}
                {{--<h2 class="title">Featured Games</h2>--}}
                {{--<article>--}}
                    {{--<div class="image-container">--}}
                        {{--<img src="{{ asset('images/placeholders/featured_1.jpg') }}" alt="" class="thumbnail">--}}
                        {{--<a href="#" class="arrow-link"><img src="{{ asset('images/backgrounds/mosaic-bg.png') }}" alt="" /></a>--}}
                    {{--</div>--}}
                    {{--<h5> <a href="#">Lorem Ipsum is Simply a Headline</a></h5>--}}
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>--}}
                {{--</article>--}}
                {{--<article>--}}
                    {{--<div class="image-container">--}}
                        {{--<img src="{{ asset('images/placeholders/featured_2.jpg') }}" alt="" class="thumbnail">--}}
                        {{--<a href="#" class="arrow-link"><img src="{{ asset('images/backgrounds/mosaic-bg.png') }}" alt="" /></a>--}}
                    {{--</div>--}}
                    {{--<h5> <a href="#">Again, just a headline</a></h5>--}}
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>--}}
                {{--</article>--}}
            {{--</div>--}}


            {{--<aside class="small-16 large-6 columns">--}}
                {{--<!--notebook-->--}}
                {{--<div class="notebook">--}}

                    {{--<header><h2 class="title">Blog Notes</h2></header>--}}
                    {{--<div class="blog-entries notebook-pattern">--}}

                        {{--<div class="entry row large-collapse">--}}
                            {{--<div class="date small-3 large-2 columns">--}}
                                {{--<p>Sep</p><span>07</span>--}}
                            {{--</div>--}}
                            {{--<div class="article-preview small-13 large-14 columns">--}}
                                {{--<h6><a href="#">Lorem Ipsum is simply dummy text</a></h6>--}}
                                {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><a href="#" class="link">Read More &rsaquo;</a>--}}
                            {{--</div>--}}
                        {{--</div><!--//entry-->--}}

                        {{--<div class="entry row large-collapse">--}}
                            {{--<div class="date small-3 large-2 columns">--}}
                                {{--<p>Sep</p><span>01</span>--}}
                            {{--</div>--}}
                            {{--<div class="article-preview small-13 large-14 columns">--}}
                                {{--<h6><a href="#">New Game Released</a></h6>--}}
                                {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><a href="#" class="link">Read More &rsaquo;</a>--}}
                            {{--</div>--}}
                        {{--</div><!--//entry-->--}}

                        {{--<div class="entry row large-collapse">--}}
                            {{--<div class="date small-3 large-2 columns">--}}
                                {{--<p>Aug</p><span>25</span>--}}
                            {{--</div>--}}
                            {{--<div class="article-preview small-13 large-14 columns">--}}
                                {{--<h6><a href="#">Game Update Available</a></h6>--}}
                                {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><a href="#" class="link">Read More &rsaquo;</a>--}}
                            {{--</div>--}}
                        {{--</div><!--//entry-->--}}

                        {{--<div class="entry row large-collapse">--}}
                            {{--<div class="date small-3 large-2 columns">--}}
                                {{--<p>Jul</p><span>31</span>--}}
                            {{--</div>--}}
                            {{--<div class="article-preview small-13 large-14 columns">--}}
                                {{--<h6><a href="#">Patch Release 1.1</a></h6>--}}
                                {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><a href="#" class="link">Read More &rsaquo;</a>--}}
                            {{--</div>--}}
                        {{--</div><!--//entry-->--}}

                    {{--</div>--}}
                {{--</div>--}}
                {{--<!--//notebook-->--}}

                {{--<!--twitter-feed-->--}}
                {{--<div class="twitter-feed">--}}
                    {{--<div class="icon-container">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 56.693 56.693"><path d="M54.082 15.55c-1.812.804-3.76 1.347-5.805 1.59 2.087-1.25 3.69-3.23 4.444-5.59-1.952 1.158-4.114 2-6.417 2.453-1.843-1.965-4.47-3.192-7.377-3.192-5.58 0-10.107 4.526-10.107 10.108 0 .792.09 1.563.26 2.302-8.4-.42-15.847-4.444-20.83-10.56-.87 1.493-1.37 3.23-1.37 5.082 0 3.506 1.785 6.6 4.497 8.412-1.657-.053-3.216-.507-4.578-1.264-.002.042-.002.084-.002.128 0 4.896 3.484 8.98 8.108 9.91-.848.23-1.74.354-2.663.354-.652 0-1.285-.063-1.902-.18 1.288 4.014 5.02 6.936 9.442 7.018-3.46 2.71-7.817 4.326-12.552 4.326-.816 0-1.62-.048-2.41-.14 4.473 2.867 9.785 4.54 15.492 4.54 18.59 0 28.756-15.4 28.756-28.757 0-.438-.01-.875-.028-1.308 1.974-1.425 3.688-3.205 5.042-5.232z"/></svg>--}}
                    {{--</div>--}}
                    {{--<div class="triangle-container">--}}
                        {{--<div class="triangle"></div>--}}
                    {{--</div>--}}
                    {{--<div class="iframe-container">--}}
                        {{--<a class="twitter-timeline"--}}
                           {{--data-widget-id="348068464663080960"--}}
                           {{--href="https://twitter.com/jalberto13"--}}
                           {{--width="300"--}}
                           {{--height="300"--}}
                           {{--data-tweet-limit="1"--}}
                           {{--data-aria-polite="assertive"--}}
                           {{--data-chrome="noheader nofooter noborders transparent noscrollbar">--}}
                        {{--</a>--}}
                        {{--<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>--}}
                    {{--</div>--}}
                    {{--<!--//iframe-continer-->--}}
                {{--</div>--}}
                {{--<!--//twitter-feed-->--}}

            {{--</aside>--}}

        {{--</div>--}}
    </section>

@endsection
