<header id="main-header">
    <div class="row">
        <div class="small-11 large-6 columns"><a href="{{ route('home') }}"><img src="{{ asset('images/logo_new_small.png') }}" alt="AwakenHeroes" class="logo"></a></div>
        <nav id="main-nav" class="small-16 large-10 columns">
                <ul class="main-menu dropdown" data-dropdown-menu>
                    @if(\App\Http\canDo('user.update'))
                        <li class="has-dropdown @if(Request::is('trinity/users*')) active @endif">
                            <a><i class="fa fa-user"></i> Admin</a>
                            <ul class="menu dropdown">
                                <li style="background-color: #88332E;"  @if(Request::is('admin/users/manage*')) class="active" @endif><a href="{{ route('admin.user.manage') }}">Management</a></li>
                                <li style="background-color: #88332E;" @if(Request::is('admin/users/roles*')) class="active" @endif><a href="{{ route('admin.user.roles') }}">Roles and Permissions</a></li>
                                <li style="background-color: #88332E;" @if(Request::is('admin/users/create*')) class="active" @endif><a>New User</a></li>
                            </ul>
                        </li>
                    @endif
                {{--@if(\App\Http\canDo('user.update'))--}}
                    {{--<li><a @if(Request::is('admin*')) class="active" @endif href="{{ route('admin.user.roles') }}">Admin</a></li>--}}
                {{--@endif--}}
                <li><a @if(Request::is('/')) class="active" @endif href="{{ route('home') }}">Home</a></li>
                <li><a @if(Request::is('news')) class="active" @endif href="{{ route('news') }}">News</a></li>
                <li><a @if(Request::is('forums')) class="active" @endif href="{{ route('forums.lists') }}">Forum</a></li>
                <li><a @if(Request::is('about')) class="active" @endif href="{{ route('about') }}">About</a></li>
                <li><a @if(Request::is('contact')) class="active" @endif href="{{ route('contact') }}">Contact</a></li>
                @if(Auth::check()) <li><a href="{{ route('doLogout') }}">Logout</a></li>@endif
                <li>
                    @if( ! Auth::check())
                        <a href="{{ route('login') }}">Login</a>
                    @else
                        <a @if(Request::is('profile')) class="active" @endif href="{{ route('profile.lists') }}">{{ Auth::user()->username }} @if(Auth::user()->friendRequests->count() > 0)<b class="badge">{{ Auth::user()->friendRequests->count() }}</b>@endif</a>
                    @endif
                </li>
            </ul>
            <ul class="mobile-menu"></ul>
        </nav>
    </div>
</header>
