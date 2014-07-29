<!doctype html>
<html>

<head>
    @section('head')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"></script>
    @if (App::getLocale() == 'de')
        {{ HTML::script('lib/js/bootstrapValidator-de_DE.js') }}
    @endif

    {{ HTML::script('lib/js/master.js') }}
    {{ HTML::style('lib/css/style.css') }}
    @show
</head>

<body>
    <!-- Header -->
    <header>
        @include('layouts.menu')
    </header>

    <!-- Content -->
    <div class="container">
        <div id="msgBag">{{ Notification::showAll() }}</div>
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        @include('layouts.footer')
    </footer>

    <!-- Footer Scripts -->
    @section('footerScripts')
    @show

</body>
</html>