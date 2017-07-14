@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1><i class="fa fa-plus-circle"></i> Update Role</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row team">
            <div class="large-16 columns">
                <form method="post" action="{{ route('admin.role.update', $role->slug) }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="large-12 columns">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <label>Name of the role
                                    <input type="text" name="name" placeholder="Name of the role" value="{{ $role->title }}"/>
                                </label>
                                <label>Slug of the role
                                    <input type="text" name="slug" placeholder="Slug of the role" value="{{ $role->slug }}"/>
                                </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <table width="100%">
                                <thead>
                                <tr>
                                    <th width="200">Permission</th>
                                    <th>Enabled</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $access => $permission)
                                    <tr>
                                        <td>{{ $access }}</td>
                                        <td>
                                            <label>{{ $access }} Permissions</label>
                                            @foreach($permission as $p)
                                                <input id="{{ camel_case($access . $p['access']) }}" type="checkbox" name="permissions[{{ strtolower($access . '.' . $p['access']) }}]" @if($role->hasPermission(strtolower($access . '.' . $p['access']))) checked @endif><label for="{{ camel_case($access . $p['access']) }}"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{ $p['description'] }}">{{ preg_replace('/(?<!\ )[A-Z]/', ' $0', $p['access']) }}</span></label>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <ul class="button-group radius">
                                <a href="{{ route('admin.user.roles') }}" class="medium button alert"><i class="fa fa-times"></i> Cancel</a>
                                <button type="submit" class="medium button success"><i class="fa fa-check"></i> Save Role</button>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@stop

@section('breadcrumbs')
    <nav class="breadcrumbs" role="menubar" aria-label="breadcrumbs">
        <li role="menuitem"><a href="#">Home</a></li>
        <li role="menuitem"><a href="#">Users</a></li>
        <li role="menuitem"><a href="{{ route('admin.user.roles') }}">Roles and Permissions</a></li>
        <li role="menuitem" class="current"><a href="#">Add</a></li>
    </nav>
@stop

@section('scripts')
    <script>{{ asset('js/foundation.tooltip.js') }}</script>
@stop
