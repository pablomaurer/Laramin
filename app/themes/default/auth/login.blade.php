@extends('layouts.master')

@section('content')
<p>This is my body content. i'm in login.php</p>

<div class="container">
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><strong>{{ trans('login.loginTitle') }}</strong></h3></div>
        <div class="panel-body">

            {{ Form::open(array('route' => 'login')) }}
            <form class="" role="form">

                <div class="form-group">
                    <label for="mail">{{ trans('login.email') }}</label>
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
                    <label class="checkbox">
                        <input type="checkbox" name="remember"> {{ trans('login.remember') }}
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">{{ trans('login.login') }}</button>
                {{ trans('global.or') }} <a href="{{ route('register') }}">{{ trans('login.register') }}</a>

                <hr>

                <div class="form-group">
                    <a href="#"> {{ trans('login.forgot') }}</a> <?php //todo route forgot ?>
                </div>

            </form>
            {{ Form::close() }}

        </div>
    </div>
</div>
</div>
@stop