<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeroesAwaken</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Luckiest+Guy|Bitter:700|Open+Sans:400,600,600italic">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v40">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    @yield('styles')

	
    <script type="text/javascript" src="{{ asset('js/js-3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js-2.js') }}"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/css-3.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/css-2.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/custom.css') }}" />

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