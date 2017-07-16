<header id="main-header">
    <div class="row">
        <div class="small-11 large-6 columns"><a href="{{ route('home') }}"><img src="{{ asset('images/logo_new_small.png') }}" alt="AwakenHeroes" class="logo"></a></div>
        <nav id="main-nav" class="small-16 large-10 columns">

            <div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
                <button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
                <div class="title-bar-title">Menu</div>
            </div>

            <div class="top-bar" style="background-color: transparent;" id="responsive-menu">
                <div class="top-bar-left" style="background-color: transparent;">
                    <ul class="dropdown menu" style="background-color: transparent;" data-dropdown-menu>
                        <li class="menu-text">Admin Dashboard</li>
                        <li class="has-submenu @if(Request::is('admin/users*')) active @endif">
                            <a><i class="fa fa-users"></i>Users</a>
                            <ul class="submenu menu vertical" data-submenu>
                                @if(\App\can('user.update'))<li style="background-color: #88332E;"  @if(Request::is('admin/users/manage*')) class="active" @endif><a href="{{ route('admin.user.manage') }}"><i class="fa fa-cogs"></i>Management</a></li>@endif
                                @if(\App\can('user.update'))<li style="background-color: #88332E;" @if(Request::is('admin/users/roles*')) class="active" @endif><a href="{{ route('admin.user.roles') }}"><i class="fa fa-users"></i>Roles and Permissions</a></li>@endif
                                @if(\App\can('user.update'))<li style="background-color: #88332E;" @if(Request::is('admin/users/create*')) class="active" @endif><a><i class="fa fa-user-plus"></i>New User</a></li>@endif
                            </ul>
                        </li>
                        <li class="has-submenu @if(Request::is('admin/forums*')) active @endif">
                            <a><i class="fa fa-envelope"></i>Forum</a>
                            <ul class="submenu menu vertical" data-submenu>
                                <li style="background-color: #88332E;"><a><i class="fa fa-cogs"></i>Management</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu @if(Request::is('admin/news*')) active @endif">
                            <a><i class="fa fa-newspaper-o"></i>News</a>
                            <ul class="submenu menu vertical" data-submenu>
                                <li style="background-color: #88332E;" @if(Request::is('admin/news')) class="active" @endif><a href="{{ route('admin.news.lists') }}"><i class="fa fa-cogs"></i>Management</a></li>
                                <li style="background-color: #88332E;" @if(Request::is('admin/news/create')) class="active" @endif><a href="{{ route('admin.news.create') }}"><i class="fa fa-plus"></i>Add news</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            {{--<ul class="main-menu dropdown" data-dropdown-menu>--}}
                {{--@if(\App\Http\canDo('user.update'))--}}
                    {{--<li class="has-dropdown @if(Request::is('trinity/users*')) active @endif">--}}
                        {{--<a><i class="fa fa-user"></i> Admin</a>--}}
                        {{--<ul class="menu dropdown">--}}
                            {{--<li style="background-color: #88332E;"  @if(Request::is('admin/users/manage*')) class="active" @endif><a href="{{ route('admin.user.manage') }}">Management</a></li>--}}
                            {{--<li style="background-color: #88332E;" @if(Request::is('admin/users/roles*')) class="active" @endif><a href="{{ route('admin.user.roles') }}">Roles and Permissions</a></li>--}}
                            {{--<li style="background-color: #88332E;" @if(Request::is('admin/users/create*')) class="active" @endif><a>New User</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}
                {{--@if(\App\Http\canDo('user.update'))--}}
                {{--<li><a @if(Request::is('admin*')) class="active" @endif href="{{ route('admin.user.roles') }}">Admin</a></li>--}}
                {{--@endif--}}

                {{--@if( ! Auth::check())--}}
                    {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                {{--@else--}}
                    {{--<li class="has-dropdown @if(Request::is('trinity/users*')) active @endif">--}}
                        {{--<a @if(Request::is('profile')) class="active" @endif href="{{ route('profile.lists') }}">{{ Auth::user()->username }} @if(Auth::user()->friendRequests->count() > 0)<b class="badge">{{ Auth::user()->friendRequests->count() }}</b>@endif</a>--}}
                        {{--<ul class="menu dropdown">--}}
                            {{--<li style="background-color: #88332E;"><a href="{{ route('doLogout') }}">Logout</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--</ul>--}}
            {{--<ul class="mobile-menu"></ul>--}}
        </nav>
    </div>
</header>
