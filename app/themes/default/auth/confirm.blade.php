@extends('layouts.master')

@section('content')
<p>This is my body content. i'm in confirm.php</p>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>{{ trans('login.confirmTitle') }}</strong></h3></div>
            <div class="panel-body">

                {{ Form::open(array('route' => 'confirm', 'method' => 'get')) }}
                <form class="" role="form">

                    <div class="form-group">
                        <label for="activationCode">{{ trans('login.confirmCode') }}</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> <?php //todo Prio design: change confirm code icon ?>
                            <input type="activationCode" id="activationCode" name="activationCode" class="form-control" placeholder="{{ trans('login.confirmCode') }}" required autofocus>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ trans('login.register') }}</button> <?php //todo translate ?>

                    <hr>

                    <p>{{ trans('login.confirmInfo') }}</p>

                </form>
                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
@stop