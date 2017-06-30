<header id="main-header">
    <div class="row">
        <div class="small-11 large-6 columns"><a href="{{ route('home') }}"><img src="{{ asset('images/logo_new.png') }}" alt="AwakenHeroes" class="logo"></a></div>
        <nav id="main-nav" class="small-16 large-10 columns">
            <ul class="main-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li>
                    @if( ! Auth::check())
                        <a href="{{ route('login') }}">Login</a>
                    @else
                        <a href="{{ route('doLogout') }}">Logout</a>
                    @endif
                </li>
            </ul>
            <ul class="mobile-menu"></ul>
        </nav>
    </div>
</header>