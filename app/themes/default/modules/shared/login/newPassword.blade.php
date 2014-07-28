@extends('layouts.master')

@section('content')
<p>This is my body content. i'm in reset.blade.php</p>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>{{ trans('login.resetTitle') }}</strong></h3></div>
            <div class="panel-body">

                {{ Form::open(array('route' => 'newPassword')) }}
                <form class="" role="form">

                    <div class="form-group">
                        <label for="password">{{ trans('login.newPassword') }}</label>
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
                    </div><?php // todo Prio High: check same password? also in registration ?>

                    <input class="hidden" type="text" name="resetCode" value="{{ $resetCode }}">

                    <button type="submit" class="btn btn-primary">{{ trans('global.save') }}</button>

                </form>
                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
@stop