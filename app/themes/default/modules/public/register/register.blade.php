@extends('layouts.master')
@section('title', 'Register')

@section('content')
<p>This is my body content. i'm in Register.php</p>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>{{ trans('<login class="register"></login>Title') }}</strong></h3></div>
            <div class="panel-body">

                <form id="registrationForm" class="form" role="form" method="post">

                    <div class="form-group">
                        <label for="email">{{ trans('login.email') }}</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="{{ trans('login.email') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">{{ trans('login.password') }}</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" id="password" name="password" class="form-control" placeholder="{{ trans('login.password') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" id="password2" class="form-control" placeholder="{{ trans('login.password') }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ trans('login.register') }}</button>
                    {{ trans('global.or') }} <a href="{{ route('login') }}">{{ trans('login.login') }}</a>

                </form>

            </div>
        </div>
    </div>
</div>
@stop