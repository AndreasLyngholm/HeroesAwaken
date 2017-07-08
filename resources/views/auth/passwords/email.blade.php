@extends('partials.layout')

@section('content')

    @include('partials.inner_slider')

    <div class="content-top"></div>

    <section id="main-content">

        <div class="row">
            <div class="small-16 columns">
                <h1>Forgot password?</h1>
                <div class="big-sep"></div>
            </div>
        </div>

        <div class="row" style="margin-bottom: 1rem;">
            <div class="large-8 columns">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Email</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="lime-button">
                                Reset password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>

    <script>
        @if(Session::has('status'))
        swal("Success!", "{{ Session::get('status') }}", "success")
        @endif
        @if($errors->has('email'))
            swal("Warning!", "{{ $errors->first('email') }}", "warning")
        @endif
    </script>

@endsection
