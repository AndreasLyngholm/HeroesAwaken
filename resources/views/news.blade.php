@extends('partials.layout')

@section('content')

    <section class="inner-slider">
      <div style="background: url('{{ asset('images/slider_bg.png') }}')"></div>
    </section>

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>News</h1>
                <div class="big-sep"></div>
            </div>
        </div>
       
       <!-- Post you news below this text -->
       <!-- // Wazz -->
       
       <div class="row blog-entries">

            <!-- NEWS POST START -->
            <div class="small-16 large-16 columns">

                <article class="blog-entry row">
                    <div class="article-date small-16 medium-2 columns">
                        <div>
                            <p>Jul <span class="day">01</span> <span class="year">2017</span></p>
                        </div>
                    </div>

                    <div class="article-content small-16 medium-14 columns">
                        <h3>Ddos protection.</h3>
                        <p>
                            We always want to make sure you guys know when we have some downtime, these can almost everytime be found on our discord server. We recently had some downtime since we installed a new ddos protection for our site. Thanks for your support :). / Wazz (Web Developer)
                        </p>
                    </div>
                </article>
            </div>

           <div class="row">
              <div class="small-16 columns">
                  <div class="big-sep"></div>
              </div>
           </div>

           <!-- NEWS POST END -->

           <!-- NEWS POST START -->
           <div class="small-16 large-16 columns">

               <article class="blog-entry row">
                   <div class="article-date small-16 medium-2 columns">
                       <div>
                           <p>Jun <span class="day">30</span> <span class="year">2017</span></p>
                       </div>
                   </div>

                   <div class="article-content small-16 medium-14 columns">
                       <h3>Heads up.</h3>
                       <p>
                           Be sure to visit our <a href="https://discordapp.com/invite/WhK8RgX">Discord channel</a> to keep up with our latest news and announcements.
                       </p>
                   </div>
               </article>
           </div>

           <div class="row">
               <div class="small-16 columns">
                   <div class="big-sep"></div>
               </div>
           </div>

           <!-- NEWS POST END -->

           <!-- NEWS POST START -->
           <div class="small-16 large-16 columns">

               <article class="blog-entry row">
                   <div class="article-date small-16 medium-2 columns">
                       <div>
                           <p>Jun <span class="day">30</span> <span class="year">2017</span></p>
                       </div>
                   </div>

                   <div class="article-content small-16 medium-14 columns">
                       <h3>We are bringing back BFH!</h3>
                       <p>
                           Be sure to visit our <a href="https://discordapp.com/invite/WhK8RgX">Discord channel</a> to keep up with our latest news and announcements.
                       </p>
                   </div>
               </article>
           </div>

           <div class="row">
               <div class="small-16 columns">
                   <div class="big-sep"></div>
               </div>
           </div>

           <!-- NEWS POST END -->

       </div>

    </section>

@endsection
