@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1><i class="fa fa-plus"></i> Create News</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row team">
            <div class="small-16 large-16 columns callout">
                <form method="post" action="{{ route('admin.news.doCreate') }}">
                    {{ csrf_field() }}
                    <b style="color: black;">Create news post</b>
                    <br><br>

                    <label> <b style="color: black;">Title</b>
                        <input type="text" name="title" required>
                    </label>

                    <label> <b style="color: black;">Write your news post</b>
                        <textarea name="text" id="editor1" rows="5" cols="40" placeholder="Write your post here..." required></textarea>
                    </label>
                    <br>
                    <button type="submit" class="lime-button" name="submit" style="float: right;">Create news post</button>
                    <script>
                        CKEDITOR.replace( 'editor1', {
                            uiColor: '#E2D3C0',
                            removeButtons: 'Source'
                        });
                    </script>
                </form>
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
