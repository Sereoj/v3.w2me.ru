
<!DOCTYPE HTML>
<!--
	Multiverse by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="ru">
<head>
    <title>Wallone</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}" />
    <noscript><link rel="stylesheet" href="{{ asset("assets/css/noscript.css") }}" /></noscript>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="{{ route('index') }}"><strong>Wallone</strong> by sereoj</a></h1>
    </header>

    <!-- Main -->
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset("assets/js/jquery.min.js") }}"></script>
<script src="{{ asset("assets/js/jquery.poptrox.min.js") }}"></script>
<script src="{{ asset("assets/js/browser.min.js") }}"></script>
<script src="{{ asset("assets/js/breakpoints.min.js") }}"></script>
<script src="{{ asset("assets/js/util.js") }}"></script>
<script src="{{ asset("assets/js/main.js") }}"></script>

</body>
</html>
