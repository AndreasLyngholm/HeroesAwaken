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
                    <div>
                        <img src="{{ $user->avatar ? $user->avatar : 'https://via.placeholder.com/250x250' }}" alt="">
                        <h4>User Information</h4>
                        <ul class="no-bullet">
                            <li>Username: <strong>{{ $user->username }}</strong></li>
                            <li>Email: <strong>{{ $user->email }}</strong></li>
                            <li>Birthday: <strong>{{ $user->birthday}}</strong></li>
                            <li>IP Address: <strong>{{ $user->ip_address}}</strong></li>
                            <li>Created at: <strong>{{ $user->created_at }}</strong></li>
                        </ul>
                    </div>
                    <div>
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
                    <div class="callout radius">
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
                                        <td>{{ $comment->post->name }}</td>
                                        <td>{{ $comment->created_at->format('m/d/Y') }}</td>
                                        <td>{!! substr($comment->comment, 0, 50) !!}</td>
                                        <td><a style="cursor: pointer;" class="label radius success" href="{{ route('forums.posts', [$comment->post->forum_id, $comment->topic_id]) }}#{{ $comment->id }}"><i class="fa fa-info"></i> Details</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>

            </div>
        </div>

    </section>

@stop

@section('scripts')
    <script type="text/javascript">{{ asset('js/foundation.tooltip.js') }}</script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.min.js"></script>
    <script type="text/javascript">{{ asset('js/user.js') }}</script>
@stop