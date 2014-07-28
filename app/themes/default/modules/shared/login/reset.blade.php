@extends('layouts.master')

@section('content')
<p>This is my body content. i'm in reset.blade.php</p>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>{{ trans('login.resetTitle') }}</strong></h3></div>
            <div class="panel-body">

                {{ Form::open(array('route' => 'reset')) }}
                <form class="" role="form">

                    <div class="form-group">
                        <label for="email">{{ trans('login.email') }}</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> <?php //todo Prio design: change confirm code icon ?>
                            <input type="email" id="email" name="email" class="form-control" placeholder="{{ trans('login.email') }}" required autofocus>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ trans('login.reset') }}</button> <?php //todo translate ?>

                    <hr>

                    <p>{{ trans('login.resetInfo') }}</p>

                </form>
                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
@stop