@extends('partials.layout')

@section('content')
    <div class="content-top"></div>

    <section id="main-content">
        <div class="row">
            <div class="small-16 columns">
                <h1>Dashboard</h1>
                <div class="big-sep"></div>
            </div>
        </div>
        <div class="row collapse">
            <div class="small-2 columns">
                <ul id="admin-actions-tab" class="tabs vertical">
                    <li class="tabs-title is-active" role="presentation" >
                        <a id="groups-panel-label" href="#groups-panel" role="tab" aria-controls="groups-panel" aria-selected="true">Groups</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="users-panel-label" href="#users-panel" role="tab" aria-controls="users-panel" aria-selected="false">Users</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="news-panel-label" href="#news-panel" role="tab" aria-controls="news-panel" aria-selected="false">News</a>
                    </li>
                    <li class="tabs-title" role="presentation" >
                        <a id="forums-panel-label" href="#forums-panel" role="tab" aria-controls="forums-panel" aria-selected="false">Forums</a>
                    </li>
                </ul>
            </div>
            <div class="small-14 columns">
                <div class="tabs-content vertical" data-tabs-content="admin-actions-tab">
                    <div id="groups-panel" class="tabs-panel is-active" role="tabpanel" aria-hidden="false" aria-labelledby="groups-panel-label">
                        <h2 class="title">Manage Groups</h2>
                        <hr>
                        <div class="row">
                            <div class="small-offset-1 small-6 columns">
                                <h4>Create Group</h4>
                                <form method="post" action="{{ route('admin.createGroup') }}">
                                    {{ csrf_field() }}
                                    <label>Name: </label>
                                    <input id="group_name" type="text" required>
                                    <button class="lime-button" type="submit">Create</button>
                                </form>
                            </div>

                            <div class="small-pull-1 small-6 columns">
                                <h4>Delete Group</h4>
                                <form method="post" action="{{ route('admin.deleteGroup') }}">
                                    {{ csrf_field() }}
                                    <label>Group: </label>
                                    <input id="group_name" type="text" required>
                                    <button class="lime-button" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="users-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="users-panel-label">
                        <h2 class="title">Manage Users</h2>
                    </div>
                    <div id="news-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="news-panel-label">
                        <h2 class="title">Manage News</h2>
                    </div>
                    <div id="forums-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="forums-panel-label">
                        <h2 class="title">Manage Forums</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection