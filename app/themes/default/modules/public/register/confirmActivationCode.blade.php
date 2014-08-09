@extends('layouts.master')
@section('title', 'Confirm Activation Code')

@section('content')
<script>
    $(document).ready(function()
    {
        // only on activationCode an find a better way
        // https://gist.github.com/varemenos/2531765
        function getUrlVar(key){
            var result = new RegExp(key + "=([^&]*)", "i").exec(window.location.search);
            return result && unescape(result[1]) || "";
        }
        var r = getUrlVar(activationCode);
        console.log(r);
        if (r != null) {
            console.log("there is a activationCode");
            $("#activationCode").val(r);
            $( "#confirmForm" ).submit();
            //$( "#confirmForm" ).trigger();
            console.log("triggered");
        }
    });
</script>

<p>This is my body content. i'm in confirm.php</p>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>{{ trans('login.confirmTitle') }}</strong></h3></div>
            <div class="panel-body">

                <form id="confirmForm" class="form" role="form" method="post">

                    <div class="form-group">
                        <label for="activationCode">{{ trans('login.confirmCode') }}</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> <?php //todo Prio design: change confirm code icon ?>
                            <input type="text" id="activationCode" name="activationCode" class="form-control" placeholder="{{ trans('login.confirmCode') }}" required autofocus>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ trans('login.register') }}</button> <?php //todo translate ?>

                    <hr>

                    <p>{{ trans('login.confirmInfo') }}</p>

                </form>

            </div>
        </div>
    </div>
</div>
@stop