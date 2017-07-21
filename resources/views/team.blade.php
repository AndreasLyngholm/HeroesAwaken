@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>Team</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row team">
            <h2>Awoken Lead</h2>
            <div class="small-16 columns">
                <div class="row small-up-2 medium-up-4 large-up-5">
                @foreach($leads as $user)
                    <!--team-member-->
                        <div class="column team-member">
                            <div class="photo">
                                <a href="{{ route('profile.details', $user->username) }}">
                                    <img src="{{ $user->avatar ? $user->avatar : asset('images/placeholders/about.png')  }}" class="" alt="">
                                </a>
                            </div>
                            <h5><a href="{{ route('profile.details', $user->username) }}">{{ $user->username }}</a></h5>
                        </div>
                        <!--//team-member-->
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row team">
            <h2>Staff</h2>
            <div class="small-16 columns">
                <div class="row small-up-2 medium-up-4 large-up-5">
                    @foreach($staffs as $user)
                        @if($leads->where('id', $user->id)->first() == null)
                        <!--team-member-->
                            <div class="column team-member">
                                <div class="photo">
                                    <a href="{{ route('profile.details', $user->username) }}">
                                        <img src="{{ $user->avatar ? $user->avatar : asset('images/placeholders/about.png')  }}" class="" alt="">
                                    </a>
                                </div>
                                <h5><a href="{{ route('profile.details', $user->username) }}">{{ $user->username }}</a></h5>
                            </div>
                            <!--//team-member-->
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row team">
            <h2>Awoken Dev</h2>
            <div class="small-16 columns">
                <div class="row small-up-2 medium-up-4 large-up-5">
                @foreach($devs as $user)
                    <!--team-member-->
                        <div class="column team-member">
                            <div class="photo">
                                <a href="{{ route('profile.details', $user->username) }}">
                                    <img src="{{ $user->avatar ? $user->avatar : asset('images/placeholders/about.png')  }}" class="" alt="">
                                </a>
                            </div>
                            <h5><a href="{{ route('profile.details', $user->username) }}">{{ $user->username }}</a></h5>
                        </div>
                        <!--//team-member-->
                    @endforeach
                </div>
            </div>
        </div>

    </section>

@endsection