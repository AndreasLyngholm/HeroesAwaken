@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1><i class="fa fa-sitemap"></i> Audit</h1>
                @if(Session::has('success'))
                    <div class="large-4">
                        <div data-alert class="alert-box success radius">
                            {{ Session::get('success') }}
                            <a href="#" class="close">&times;</a>
                        </div>
                    </div>
                @endif
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row team">
            <div class="large-16 columns">
                <table class="large-16">
                    <thead>
                    <tr>
                        <th width="20%;">Username</th>
                        <th width="15%;">Permission</th>
                        <th width="25%;">Action</th>
                        <th width="20%;">IP Address</th>
                        <th width="20%;">Timestamp</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($audits as $audit)
                        <tr>
                            <td>{{ $audit->user->username }}</td>
                            <td>{{ $audit->permission }}</td>
                            <td>{{ $audit->action }}</td>
                            <td>{{ $audit->ip_address }}</td>
                            <td>{{ $audit->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@stop

@section('breadcrumbs')
    <nav class="breadcrumbs" role="menubar" aria-label="breadcrumbs">
        <li role="menuitem"><a href="#">Home</a></li>
        <li role="menuitem"><a href="#">Users</a></li>
        <li role="menuitem" class="current"><a href="#">Roles and Permissions</a></li>
    </nav>
@stop
