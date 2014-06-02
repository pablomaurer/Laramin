<!doctype html>
<html>

<head>
    @section('head')
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
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
    <section>
        <div id="msgBag">{{ Notification::showAll() }}</div>
        @yield('content')
    </section>

    <!-- Footer -->
    <footer>
        @include('layouts.footer')
    </footer>

    <!-- Footer Scripts -->
    @section('footerScripts')
    @show

</body>
</html>