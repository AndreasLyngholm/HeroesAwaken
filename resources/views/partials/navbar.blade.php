<header id="main-header">
    <div class="row">
        <div class="small-11 large-6 columns"><a href="{{ route('home') }}"><img src="{{ asset('images/logo_new_small.png') }}" alt="AwakenHeroes" class="logo"></a></div>
        <nav id="main-nav" class="small-16 large-10 columns">
            <ul class="main-menu dropdown menu" data-dropdown-menu>
                @if(\App\can('user.update'))
                    <li @if(Request::is('admin*'))class="active" @endif><a href="{{ route('admin.user.manage') }}"><i class="fa fa-user"></i> Admin</a></li>
                @endif
                <li><a @if(Request::is('/')) class="active" @endif href="{{ route('home') }}">@lang('layout.home')</a></li>
                <li><a @if(Request::is('news')) class="active" @endif href="{{ route('news') }}">@lang('layout.news') @if(Auth::check()) @if(Auth::user()->notifications['news'])<b class="badge"><i class="fa fa-bell"></i></b>@endif @endif</a></li>
                <li><a @if(Request::is('forums')) class="active" @endif href="{{ route('forums.lists') }}">@lang('layout.forum')</a></li>
                <li><a @if(Request::is('team')) class="active" @endif href="{{ route('team') }}">@lang('layout.team')</a></li>
                <li><a @if(Request::is('contact')) class="active" @endif href="{{ route('contact') }}">@lang('layout.contact')</a></li>
                    @if( ! Auth::check())
                      <li><a href="{{ route('login') }}">@lang('layout.login')</a></li>
                    @else
                    <li class="has-dropdown @if(Request::is('profile')) active @endif">
                        <a @if(Request::is('profile')) class="active" @endif>{{ Auth::user()->username }} @if(Auth::user()->friendRequests->count() > 0)<b class="badge">{{ Auth::user()->friendRequests->count() }}</b>@endif</a>
                        <ul class="menu">
                            <li><a href="{{ route('profile.lists') }}">@lang('layout.profile')</a></li>
                            <li><a href="{{ route('doLogout') }}">@lang('layout.logout')</a></li>
                        </ul>
                    </li>
                    @endif
            </ul>
            <ul class="mobile-menu"></ul>
        </nav>
    </div>
</header>
