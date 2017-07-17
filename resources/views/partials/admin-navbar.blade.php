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
                        @if(\App\can('user.update'))
                            <li class="has-submenu @if(Request::is('admin/users*')) active @endif">
                                <a><i class="fa fa-users"></i>Users</a>
                                <ul class="submenu menu vertical" data-submenu>
                                    @if(\App\can('user.update'))<li style="background-color: #88332E;"  @if(Request::is('admin/users/manage*')) class="active" @endif><a href="{{ route('admin.user.manage') }}"><i class="fa fa-cogs"></i>Management</a></li>@endif
                                    @if(\App\can('user.roles'))<li style="background-color: #88332E;" @if(Request::is('admin/users/roles*')) class="active" @endif><a href="{{ route('admin.user.roles') }}"><i class="fa fa-users"></i>Roles and Permissions</a></li>@endif
                                    @if(\App\can('user.add'))<li style="background-color: #88332E;" @if(Request::is('admin/users/create*')) class="active" @endif><a><i class="fa fa-user-plus"></i>New User</a></li>@endif
                                </ul>
                            </li>
                        @endif
                        @if(\App\can('forum.manage'))
                            <li class="has-submenu @if(Request::is('admin/forums*')) active @endif">
                                <a><i class="fa fa-envelope"></i>Forum</a>
                                <ul class="submenu menu vertical" data-submenu>
                                    @if(\App\can('forum.manage'))<li style="background-color: #88332E;"><a><i class="fa fa-cogs"></i>Management</a></li>@endif
                                </ul>
                            </li>
                        @endif
                        @if(\App\can('news.manage'))
                            <li class="has-submenu @if(Request::is('admin/news*')) active @endif">
                                <a><i class="fa fa-newspaper-o"></i>News</a>
                                <ul class="submenu menu vertical" data-submenu>
                                    @if(\App\can('news.manage'))<li style="background-color: #88332E;" @if(Request::is('admin/news')) class="active" @endif><a href="{{ route('admin.news.lists') }}"><i class="fa fa-cogs"></i>Management</a></li>@endif
                                    @if(\App\can('news.add'))<li style="background-color: #88332E;" @if(Request::is('admin/news/create')) class="active" @endif><a href="{{ route('admin.news.create') }}"><i class="fa fa-plus"></i>Add news</a></li>@endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
