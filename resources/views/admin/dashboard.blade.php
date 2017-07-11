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
                        <a id="groups-panel-label" href="#groups-panel" role="tab" aria-controls="groups-panel" aria-selected="false">Groups</a>
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
                    <div id="groups-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="groups-panel-label">
                        <p>Salut</p>
                    </div>
                    <div id="users-panel" class="tabs-panel is-active" role="tabpanel" aria-hidden="false" aria-labelledby="users-panel-label">
                        <p>gros</p>
                    </div>
                    <div id="news-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="news-panel-label">
                        <p>pd</p>
                    </div>
                    <div id="forums-panel" class="tabs-panel" role="tabpanel" aria-hidden="true" aria-labelledby="forums-panel-label"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection