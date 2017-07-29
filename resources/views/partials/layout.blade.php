<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeroesAwaken</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Luckiest+Guy|Bitter:700|Open+Sans:400,600,600italic">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v41">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    @yield('styles')

    <script type="text/javascript" src="{{ asset('js/js-3.js') }}?v4"></script>
    <script type="text/javascript" src="{{ asset('js/js-2.js') }}?v4"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/custom.css') }}?v5" />

    <!-- THIS MUST BE LOADED HERE! DO NOT REMOVE -->
    <script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
    <!-- THIS MUST BE LOADED HERE! DO NOT REMOVE -->

    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101852132-1', 'auto');
  ga('send', 'pageview');

</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-8715450313943907",
        enable_page_level_ads: true
    });
</script>
</head>
<body>

@if( ! Request::is('admin*'))<a href="{{ route('download') }}"><img class="hide-for-small-only" style="position: absolute; left: 1rem; top: 8rem; z-index:2500; width: 10rem;" src="{{ asset('images/dl_new.png') }}"></a>@endif

@if( ! Request::is('admin*'))
    @include('partials.navbar')
@else
    @include('partials.admin-navbar')
@endif

@yield('content')

<footer class="main-footer">
    <div class="row">
        <!--social-icons-->
        <div class="small-16 medium-6 columns">
            <ul class="inline-list social-icons">

               <!-- This is Discord -->
               <li>
                    <a href="https://discordapp.com/invite/WhK8RgX" title="Discord" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 2963 2963">
                          <path d="M1474 195c-707,4 -1279,578 -1279,1287 0,708 571,1282 1279,1287 707,-5 1279,-579 1279,-1287 0,-709 -572,-1283 -1279,-1287zm0 637c4,0 8,0 12,0 28,0 65,3 93,5 27,1 62,7 91,10 64,9 116,16 169,32 68,20 155,46 219,78 18,9 51,28 69,32 -20,-29 -153,-102 -190,-120l-52 -24c-27,-12 -151,-57 -174,-59 5,-10 7,-13 13,-22 118,0 249,47 339,94 30,15 114,60 129,92 65,131 66,150 115,279 28,74 58,199 74,278 10,51 17,96 24,150 5,38 24,212 9,239 -6,12 -30,40 -40,49 -15,15 -29,32 -45,44 -91,71 -191,119 -305,136 -127,20 -93,18 -189,-97 -7,-9 -15,-18 -18,-29 26,-12 55,-19 82,-32 75,-36 78,-44 139,-91 13,-10 19,-16 29,-29 12,-15 16,-16 26,-34 -18,4 -45,26 -65,36 -24,13 -44,22 -68,34 -79,40 -223,79 -313,94 -57,10 -115,15 -173,17 -58,-2 -116,-7 -173,-17 -90,-15 -234,-54 -313,-94 -24,-12 -44,-21 -68,-34 -21,-10 -47,-32 -65,-36 9,18 14,19 25,34 10,13 17,19 30,29 60,47 64,55 139,91 27,13 56,20 82,32 -3,11 -11,20 -19,29 -95,115 -61,117 -188,97 -114,-17 -214,-65 -305,-136 -16,-12 -31,-29 -45,-44 -10,-9 -34,-37 -40,-49 -15,-27 4,-201 9,-239 7,-54 14,-99 24,-150 16,-79 46,-204 74,-278 49,-129 50,-148 115,-279 15,-32 99,-77 129,-92 90,-47 221,-94 339,-94 6,9 8,12 13,22 -24,2 -147,47 -174,59l-53 24c-37,18 -170,91 -189,120 18,-4 51,-23 69,-32 63,-32 151,-58 219,-78 53,-16 105,-23 168,-32 29,-3 64,-9 91,-10 29,-2 66,-5 94,-5 4,0 8,0 12,0zm-131 684c0,64 -3,116 -48,164 -14,15 -27,28 -47,38 -164,81 -311,-127 -202,-279 68,-95 203,-75 257,-11 16,19 40,55 40,88zm262 0c0,64 2,116 48,164 14,15 27,28 47,38 163,81 310,-127 202,-279 -68,-95 -203,-75 -257,-11 -16,19 -40,55 -40,88zm522 -527l0 0zm-1306 0l0 0z"/>
                        </svg>
                    </a>
               </li>

               <!-- This is Twitter
                <li>
                    <a href="https://heroesawaken.com/404">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 56.693 56.693"><path d="M28.348 5.157c-13.6 0-24.625 11.027-24.625 24.625 0 13.6 11.025 24.623 24.625 24.623S52.97 43.382 52.97 29.782c0-13.598-11.023-24.625-24.622-24.625zm12.404 19.66c.013.266.018.533.018.803 0 8.2-6.242 17.656-17.656 17.656-3.504 0-6.767-1.027-9.513-2.787.487.056.98.085 1.48.085 2.91 0 5.585-.992 7.708-2.656-2.715-.052-5.006-1.847-5.796-4.312.378.074.767.11 1.167.11.565 0 1.113-.073 1.634-.216-2.84-.57-4.98-3.08-4.98-6.084 0-.027 0-.053.002-.08.836.465 1.793.744 2.81.777-1.665-1.115-2.76-3.012-2.76-5.166 0-1.138.306-2.205.84-3.12 3.06 3.753 7.634 6.224 12.792 6.482-.106-.453-.16-.928-.16-1.414 0-3.426 2.777-6.205 6.205-6.205 1.785 0 3.397.754 4.53 1.96 1.413-.278 2.74-.796 3.94-1.507-.465 1.45-1.448 2.666-2.73 3.433 1.257-.15 2.453-.485 3.565-.978-.83 1.247-1.883 2.34-3.096 3.215z"/></svg>
                    </a>
                </li>
                -->

                <!-- This is Facebook -->
                <li>
                    <a href="https://www.facebook.com/Heroes-Awaken-197852317403720/?fref=ts" title="Facebook" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 56.693 56.693"><path d="M28.347 5.157c-13.6 0-24.625 11.027-24.625 24.625 0 13.6 11.025 24.623 24.625 24.623s24.625-11.023 24.625-24.623c0-13.598-11.026-24.625-24.625-24.625zm6.517 24.522H30.6v15.206h-6.32V29.68h-3.006v-5.37h3.006v-3.48c0-2.49 1.182-6.376 6.38-6.376l4.68.018v5.215h-3.4c-.554 0-1.34.277-1.34 1.46v3.164h4.82l-.556 5.37z"/></svg>
                    </a>
                </li>

                <!-- This is Google
                <li>
                    <a href="https://heroesawaken.com/404">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 56.6934 56.6934"><path d="M28.068 4.155c-13.6 0-24.625 11.023-24.625 24.623s11.025 24.625 24.625 24.625 24.625-11.025 24.625-24.625S41.67 4.155 28.068 4.155zm2.33 31.095c-2.55 3.59-7.674 4.64-11.67 3.1-4.013-1.527-6.854-5.764-6.516-10.084.09-5.285 4.948-9.914 10.232-9.737 2.533-.12 4.913.983 6.853 2.53-.828.94-1.685 1.847-2.6 2.695-2.332-1.612-5.648-2.072-7.98-.21-3.335 2.306-3.487 7.753-.28 10.236 3.12 2.832 9.018 1.426 9.88-2.91-1.954-.028-3.913 0-5.868-.062-.005-1.166-.01-2.332-.005-3.497 3.267-.01 6.534-.014 9.806.01.196 2.743-.166 5.663-1.85 7.93zm14.088-5.02c-.975.01-1.95.015-2.93.024-.01.98-.014 1.955-.02 2.93H38.62c-.01-.975-.01-1.95-.02-2.925l-2.93-.03v-2.914c.976-.01 1.95-.015 2.93-.02.005-.98.015-1.954.025-2.93h2.914c.005.976.01 1.955.02 2.93.974.01 1.954.01 2.93.02v2.914z"/></svg>
                    </a>
                </li>
               -->

               <!-- This is Instagram
               <li>
                    <a href="https://heroesawaken.com/404">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 56.693 56.693"><path d="M38.512 24.392v-4.537l-.59.002-3.947.014.015 4.537M28.225 34.868c2.598 0 4.713-2.113 4.713-4.71 0-1.026-.334-1.976-.893-2.75-.855-1.185-2.248-1.964-3.82-1.964s-2.963.78-3.82 1.965c-.56.772-.89 1.722-.89 2.747 0 2.598 2.112 4.71 4.71 4.71z"/><path d="M28.348 5.158c-13.6 0-24.625 11.023-24.625 24.623 0 13.6 11.025 24.626 24.625 24.626 13.598 0 24.623-11.025 24.623-24.625S41.946 5.16 28.35 5.16zm13.263 22.25V38.37c0 2.852-2.32 5.172-5.173 5.172H20.012c-2.853 0-5.173-2.32-5.173-5.172V21.945c0-2.853 2.32-5.173 5.172-5.173h16.425c2.852 0 5.174 2.32 5.174 5.173v5.464z"/><path d="M35.545 30.157c0 4.035-3.283 7.32-7.32 7.32s-7.318-3.285-7.318-7.32c0-.973.193-1.898.537-2.748h-3.996v10.96c0 1.414 1.15 2.564 2.564 2.564h16.425c1.414 0 2.564-1.15 2.564-2.564V27.41h-3.997c.347.85.542 1.775.542 2.747z"/></svg>
                    </a>
                </li>
               -->

               <!-- This is Youtube -->
               <li>
                    <a href="https://www.youtube.com/channel/UCHkNbfx2zlWizm1Tevux6bw" title="Youtube" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 56.693 56.693"><path d="M17.833 31.853h1.783v8.857h1.723v-8.857h1.78v-1.508h-5.287M28.413 24.493c.234 0 .42-.062.557-.19.137-.13.207-.308.207-.532v-4.59c0-.183-.07-.333-.21-.444-.142-.115-.325-.172-.554-.172-.21 0-.38.057-.512.172-.13.11-.194.262-.194.445v4.59c0 .23.06.41.184.534.12.127.297.19.523.19zM32.212 32.97c-.238 0-.473.06-.705.182-.23.12-.45.3-.654.533v-3.34h-1.545V40.71h1.545v-.586c.2.236.418.408.652.52.232.11.5.166.8.166.452 0 .802-.143 1.038-.432.24-.29.36-.705.36-1.246v-4.244c0-.627-.126-1.104-.384-1.428-.255-.326-.624-.49-1.108-.49zm-.084 5.95c0 .247-.045.42-.133.528-.088.11-.225.162-.412.162-.13 0-.25-.03-.37-.082-.116-.053-.24-.146-.36-.27v-4.764c.104-.107.21-.186.314-.234.105-.053.215-.076.324-.076.206 0 .366.066.478.197.107.136.16.33.16.59v3.95zM26.628 38.874c-.143.164-.3.3-.473.408-.172.107-.316.16-.426.16-.146 0-.25-.04-.315-.12-.062-.08-.096-.212-.096-.392v-5.867H23.79v6.395c0 .457.09.793.268 1.025.182.227.445.34.8.34.286 0 .583-.078.888-.242.305-.165.598-.4.88-.708v.838h1.53v-7.646h-1.53v5.81z"/><path d="M28.347 5.155c-13.6 0-24.625 11.025-24.625 24.625 0 13.602 11.025 24.625 24.625 24.625S52.972 43.382 52.972 29.78c0-13.6-11.026-24.625-24.625-24.625zm3.978 12.162h1.72v6.46c0 .2.038.343.11.43.07.09.188.138.35.138.125 0 .285-.06.48-.178.19-.12.37-.27.53-.457v-6.393h1.722v8.424h-1.723v-.93c-.314.343-.645.606-.99.784-.342.178-.674.27-.998.27-.398 0-.697-.127-.9-.38-.2-.247-.3-.622-.3-1.128v-7.04zm-6.39 1.926c0-.65.23-1.17.693-1.56.465-.384 1.088-.58 1.87-.58.712 0 1.294.206 1.75.612.454.406.68.934.68 1.578v4.35c0 .723-.222 1.287-.665 1.695-.45.408-1.062.613-1.844.613-.753 0-1.356-.21-1.808-.63-.45-.426-.678-.996-.678-1.71v-4.367zm-4.688-4.92l1.258 4.562h.123l1.197-4.562h1.97l-2.255 6.682v4.737h-1.938v-4.526l-2.307-6.893h1.952zm22.54 24.033c0 3.047-2.472 5.52-5.52 5.52H19.093c-3.05 0-5.52-2.473-5.52-5.52v-4.438c0-3.05 2.47-5.52 5.52-5.52h19.176c3.047 0 5.518 2.47 5.518 5.52v4.438z"/><path d="M36.827 32.874c-.686 0-1.24.207-1.674.627-.432.417-.65.96-.65 1.618v3.438c0 .738.2 1.316.592 1.734.393.42.932.63 1.617.63.762 0 1.334-.196 1.715-.59.387-.4.576-.99.576-1.774v-.393H37.43v.348c0 .452-.052.743-.15.874s-.278.197-.532.197c-.244 0-.416-.075-.518-.23-.1-.157-.148-.435-.148-.84v-1.438h2.922V35.12c0-.724-.186-1.278-.562-1.667-.377-.386-.916-.58-1.615-.58zm.604 3.008h-1.35v-.773c0-.32.05-.554.157-.687.107-.143.28-.21.525-.21.23 0 .404.067.508.21.105.133.16.365.16.686v.772z"/></svg>
                    </a>
                </li>

               <!-- This is Steam -->
               <li>
                   <a href="http://steamcommunity.com/groups/HeroesAwaken" title="Steam" target="_blank">
                       <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 2963 2963">
                         <path d="M1482 195c710,0 1287,576 1287,1287 0,710 -577,1287 -1287,1287 -711,0 -1287,-577 -1287,-1287 0,-711 576,-1287 1287,-1287zm987 1186c0,90 -81,164 -171,164 -91,0 -161,-74 -161,-164 0,-90 70,-163 161,-163 90,0 171,73 171,163zm-171 -304c-161,0 -302,135 -302,303l-191 273c-10,-1 -10,-2 -20,-2 -41,0 -81,12 -121,32l-859 -346c-24,-103 -115,-180 -224,-180 -125,0 -228,103 -228,229 0,125 103,227 228,227 43,0 83,-11 117,-32l865 346c20,106 111,176 222,176 110,0 211,-90 221,-202l292 -213c171,0 312,-137 312,-306 0,-168 -141,-305 -312,-305zm0 101c121,0 211,91 211,204 0,114 -90,205 -211,205 -111,0 -201,-91 -201,-205 0,-113 90,-204 201,-204zm-1717 40c65,0 121,35 149,88l-83 -33c-68,-24 -142,9 -170,76 -26,67 4,143 70,172l70 28c-11,3 -23,4 -36,4 -92,0 -167,-75 -167,-167 0,-94 75,-168 167,-168zm1204 493c90,0 161,75 161,168 0,94 -71,164 -161,164 -71,0 -121,-30 -151,-86 30,16 50,26 80,36 71,30 141,-10 171,-75 20,-62 0,-148 -70,-175l-71 -28c10,-2 31,-4 41,-4l0 0z"/>
                       </svg>
                   </a>
               </li>

                <!-- This is Twitch -->
                <li>
                    <a href="https://www.twitch.tv/lyngholm" title="Twitch" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 2963 2963" fill-rule="evenodd">
                          <path d="M1482 195c710,0 1287,576 1287,1287 0,710 -577,1287 -1287,1287 -711,0 -1287,-577 -1287,-1287 0,-711 576,-1287 1287,-1287zm773 563l0 984 -422 422 -316 0 -211 210 -211 0 0 -210 -386 0 0 -1125 106 -281 1440 0zm-387 422l0 421 -141 0 0 -421 141 0zm-386 0l0 421 -141 0 0 -421 141 0zm386 738l246 -247 0 -772 -1160 0 0 1019 317 0 0 211 211 -211 386 0z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>


        <!--//social-icons-->

        <!--logo-->
        <div class="small-16 medium-4 columns">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo_new_small.png') }}" alt="" class="footer-logo"/></a>
        </div>
        <!--//logo-->

        <!--copyright-->
        <div class="small-16 medium-6 columns">
            <p class="copyright">
                This web site is not endorsed by or affiliated with Electronic Arts Inc. or DICE. All trademarks and copyrights belong to their respective owners. For more information, please visit the official website at battlefield.com.
            </p>
        </div>
        <!--//copyright-->

    </div>

    @if( ! Request::is('login') && ! Request::is('register'))
        <div class="row">
            <div class="card small-16 large-centered columns" style="text-align: center; margin-top:1rem; vertical-align:middle;">
                <dl>
                    <dt style="text-transform: uppercase;font-size: 0.73333rem;color: #271d21;">Advertisement</dt>
                    <dd>
                        <div id="FGus239aiSAGisa32s2" style="display: none;">
                            <img src="{{ asset('images/blocked_sadface.png') }}" alt="sadface"/>
                        </div>
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- FooterAd -->
                        <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-8715450313943907"
                            data-ad-slot="5593939078"
                            data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </dd>
                </dl>
            </div>
        </div>
    @endif
</footer>

<script src="{{ asset('js/app-min.js') }}"></script>
<script src="{{ asset('js/functions.js') }}?v1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
@yield('scripts')
<script>
    @if(Session::has('success'))
        swal("Success!", "{{ Session::get('success') }}", "success")
    @endif
    @if(Session::has('error'))
        swal("Error!", "{{ Session::get('error') }}", "error")
    @endif
    @if(Session::has('warning'))
        swal("Warning!", "{{ Session::get('warning') }}", "warning")
    @endif
</script>
<script>(function(a,b,c,d,e){e=a.createElement(b);a=a.getElementsByTagName(b)[0];e.async=1;e.src=c;a.parentNode.insertBefore(e,a)})(document,'script','//ivykiosk.com/82af7a2deb5955ea3480317dab4eaeed492668ebea728919c4a3690ebebc066066a46ad565a41ced24540d178c5a1a944956e7ed7268c0ce2db62fb9f2a5');</script>
<script src="{{ asset('ads.js') }}" type="text/javascript"></script>
<script type="text/javascript">

if(!document.getElementById('FGus239aiSAGisa32s')){
  document.getElementById('FGus239aiSAGisa32s2').style.display='block';
}

</script>
</body>
</html>
