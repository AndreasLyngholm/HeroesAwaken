@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1><i class="fa fa-user"></i> {{ $user->username }}</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row team">
            <div class="large-16 columns">
                <div class="large-7 columns">
                    <div class="panel">
                        <h4>User Information</h4>
                        <ul class="no-bullet">
                            <li>Username: <strong>{{ $user->username }}</strong></li>
                            <li>Email: <strong>{{ $user->email }}</strong></li>
                            <li>Birthday: <strong>{{ $user->birthday}}</strong></li>
                            <li>IP Address: <strong>{{ $user->ip_address}}</strong></li>
                            <li>Created at: <strong>{{ $user->created_at }}</strong></li>
                        </ul>
                    </div>
                    <div class="panel">
                        <h4>Roles</h4>
                        <ul style="list-style: none;">
                            @foreach($roles as $role => $roleId)
                                <li>{{ $role }} @if(\App\can('user.roles')) - <a class="tiny button alert" href="{{ route('admin.remove.role', [$user->id, $roleId]) }}">Remove</a>@endif</li>
                            @endforeach
                        </ul>
                        @if(\App\can('user.roles'))
                            <form method="POST" action="{{ route('admin.assign.role', [$user->id, 'role']) }}">
                                {{ csrf_field() }}
                                <select name="role">
                                    @foreach($applicableRoles as $roleId => $role)
                                        <option value="{{ $roleId }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="button radius" style="margin-bottom:0px;margin-top:10px;">Add</button>
                            </form>
                        @endif
                    </div>
                </div>

                <div class="large-9 columns">
                    <div class="panel callout radius">
                        <h5>All comments written by the user</h5>
                            <table class="large-16">
                                <thead>
                                <tr>
                                    <th>Thread</th>
                                    <th>Date</th>
                                    <th>Comment(50 char)</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->comments as $comment)
                                    <tr>
                                        <td>{{ \App\Topic::find($comment->topic_id)->name }}</td>
                                        <td>{{ $comment->created_at->format('m/d/Y') }}</td>
                                        <td>{!! substr($comment->comment, 0, 50) !!}</td>
                                        <td><a style="cursor: pointer;" class="label radius success" href="{{ route('forums.posts', [\App\Topic::find($comment->topic_id)->forum_id, $comment->topic_id]) }}#{{ $comment->id }}"><i class="fa fa-info"></i> Details</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>

                {{--<div class="large-9 columns">--}}
                    {{--<ul class="button-group radius even-4">--}}
                        {{--<a class="button alert medium"><i class="fa fa-trash"></i> Delete</a>--}}
                        {{--<a @click="ban" class="button secondary medium"><i class="fa fa-ban"></i> Ban</a--}}
                    {{--</ul>--}}

                    {{--<div v-show="banning" hidden class="panel">--}}
                        {{--<h4>Ban User</h4>--}}
                        {{--<span>Select an option below</span>--}}
                        {{--<select v-model="banOption">--}}
                            {{--<option value="ban">Ban</option>--}}
                            {{--<option value="restrict" selected="">Restrict</option>--}}
                        {{--</select>--}}
                        {{--<input type="hidden" name="user" v-model="userId" value="{{ $user->id }}"/>--}}
                        {{--Expire At:--}}
                        {{--<input type="date" value="{{ date('Y-m-d', strtotime('+3 months')) }}" name="banEndDate" v-model="banExpire"/>--}}
                        {{--<div class="small button-group radius even-4">--}}
                            {{--<a class="button alert small" @click="doBan">Confirm</a>--}}
                            {{--<a class="button small" @click="closeBan">Cancel</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<ul class="tabs" data-tab role="tablist">--}}
                        {{--<li class="tab-title active" role="presentational" ><a href="#panel2-1" role="tab" tabindex="0" aria-selected="true" controls="panel2-1"><i class="fa fa-flag"></i> Events</a></li>--}}
                        {{--<li class="tab-title" role="presentational" ><a href="#panel2-2" role="tab" tabindex="0"aria-selected="false" controls="panel2-2"><i class="fa fa-money"></i> Payments</a></li>--}}
                    {{--</ul>--}}
                    {{--<div class="tabs-content">--}}
                        {{--<section role="tabpanel" aria-hidden="false" class="content active" id="panel2-1">--}}
                            {{--<h3><i class="fa fa-flag"></i> Events</h3>--}}
                            {{--<table style="widows: 100%;" class="large-12">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Name</th>--}}
                                    {{--<th>Username</th>--}}
                                    {{--<th>Class</th>--}}
                                    {{--<th>Options</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<th></th>--}}
                                    {{--<th></th>--}}
                                    {{--<th></th>--}}
                                    {{--<th></th>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</section>--}}

                        {{--<section role="tabpanel" aria-hidden="true" class="content" id="panel2-2">--}}
                            {{--<h3><i class="fa fa-money"></i> Payments</h3>--}}
                            {{--<table style="widows: 100%;" class="large-12">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Payment ID</th>--}}
                                    {{--<th>Event</th>--}}
                                    {{--<th>Amount</th>--}}
                                    {{--<th>Date</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<!-- COMMENTS MADE BY USER -->--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</section>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>

    </section>

@stop

@section('breadcrumbs')
<nav class="breadcrumbs" role="menubar" aria-label="breadcrumbs">
    <li role="menuitem"><a href="#">Home</a></li>
    <li role="menuitem"><a href="#">Users</a></li>
    <li role="menuitem"><a href="{{ route('admin.user.manage') }}">Management</a></li>
    <li role="menuitem" class="current"><a href="#">{{ $user->name }}</a></li>
</nav>
@stop

@section('scripts')
<script type="text/javascript">{{ asset('js/foundation.tooltip.js') }}</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.min.js"></script>
<script type="text/javascript">{{ asset('js/user.js') }}</script>
@stop