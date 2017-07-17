@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1><i class="fa fa-users"></i> News</h1>
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
                @if(\App\can('news.add'))<a href="{{ route('admin.user.roles.add') }}" style="margin-bottom: 10px;" class="large button lime"><i class="fa fa-plus"></i> Create News</a>@endif

                <table class="large-16">
                    <thead>
                    <tr>
                        <th width="20%;">Title</th>
                        <th width="30%;">Date</th>
                        <th width="25%;">Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\News::all() as $news)
                        <tr>
                            <td class="large-3">{{ $news->title }}</td>
                            <td>{{ $news->date->format('d M Y') }}</td>
                            <td>
                                <a class="button small radius alert-success" href="{{ route('admin.news.edit', $news->id) }}"><i class="fa fa-wrench"></i> Details</a>
                                <a class="button small radius alert" href="{{ route('admin.news.delete', $news->id) }}"><i class="fa fa-trash-o"></i> Delete</a>
                            </td>
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
