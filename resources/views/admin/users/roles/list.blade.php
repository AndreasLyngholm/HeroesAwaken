@extends('partials.layout')

@section('content')
    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1><i class="fa fa-users"></i> Roles and Permissions</h1>
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
                <a href="{{ route('admin.user.roles.add') }}" style="margin-bottom: 10px;" class="large button lime"><i class="fa fa-plus"></i> New Role</a>

                <table class="large-16">
                    <thead>
                    <tr>
                        <th width="20%;">Role</th>
                        <th width="30%;">Permissions</th>
                        <th width="25%;">Users</th>
                        <th width="25%;">Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td class="large-3">{{ $role->title }}</td>
                            <td>
                                @foreach($role->slugs as $slug => $values)
                                    <ul class="no-bullet">
                                        <li>{{ ucfirst($slug) }}
                                            <ul style="list-style: none;">
                                                @foreach($values as $perm)
                                                    <li>{{ ucfirst($perm) }}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                @endforeach
                            </td>
                            <td><a href="{{ route('admin.user.manage', ['role'=>$role->id]) }}">{{ $role->users()->count() }}</a></td>
                            @if($role->users()->count() > 0)
                                <td><a class="button small radius alert disabled"><i class="fa fa-trash-o"></i> Delete</a></td>
                            @else
                                <td><a class="button small radius alert"><i class="fa fa-trash-o"></i> Delete</a></td>
                            @endif
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
