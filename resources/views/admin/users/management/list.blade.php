@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>
    
    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1><i class="fa fa-cogs"></i> User Management</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row team">
            <div class="small-16 columns">
                <div class="row">
                    <div class="large-16 columns">
                        <h3><i class="fa fa-search"></i> Search</h3>

                        <form action="{{ route('admin.user.manage') }}">
                            <fieldset>
                                <legend>Users</legend>
                                <div class="row">
                                    <div class="large-16 columns">
                                        <label>Name
                                            <input value="{{ \Illuminate\Support\Facades\Input::get('q') }}" type="text" name="q" placeholder="Name"/>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-16 columns">
                                        <button class="button small radius" style="margin-bottom:0px;"><i class="fa fa-search"></i>
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                @if(isset($searchResults))
                    <div class="row" style="margin-top: 10px;">
                        <div class="large-16 columns">
                            <table class="large-16">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>State</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($searchResults as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{!! App\User::find($user->id)->isOnline() ? "<i class='label success'>ONLINE</i>" : "<i class='label alert'>OFFLINE</i>" !!}</td>
                                        <td><a style="cursor: pointer;" class="label radius success" href="{{ route('admin.user.details', [$user->id]) }}"><i class="fa fa-info"></i> Details</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </section>
@stop

@section('breadcrumbs')
    <nav class="breadcrumbs" role="menubar" aria-label="breadcrumbs">
        <li role="menuitem"><a href="#">Home</a></li>
        <li role="menuitem"><a href="{{ route('admin.user.manage') }}">Users</a></li>
        <li role="menuitem" class="current"><a href="#">Management</a></li>
    </nav>
@stop