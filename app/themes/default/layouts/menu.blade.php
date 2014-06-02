<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laramin</a> <?php //todo option to change Backend Title ?>
        </div>

        <!-- Nav Container -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <!-- Menu Left-->
            <ul class="nav navbar-nav">
                {{-- instead $mainNav->asBootstrap() use direct include of items from the package, because i want my own navbar --}}
                @include('packages.lavary.laravel-menu.bootstrap-navbar-items', array('items' => $mainNav->roots()))
            </ul>

            <!-- Menu Right -->
            <ul class="nav navbar-nav navbar-right">
                <li id="loadingImg"><img id="s" style=" float: right; padding-top: 15px; padding-bottom: 15px;" src="{{ URL::asset("lib/img/ajax-loader.gif") }}" /></li>
                {{-- replaced $loginNav->asBootstrap() --}}
                @include('packages.lavary.laravel-menu.bootstrap-navbar-items', array('items' => $loginNav->roots()))
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
