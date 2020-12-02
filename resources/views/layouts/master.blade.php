<!DOCTYPE html>
<html>
<head>
    <title>Nationaal Jeugd Ontbijt</title>
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/frontpagestylesheet.css">
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/contact.css">
    <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
    <meta name="_token" content="{{ csrf_token() }}">
</head>
<body>

@include('layouts.components.menu')

<!-- Header -->
<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-heading">Nationaal Jeugd Ontbijt</div>
            <a href="#services" class="page-scroll btn btn-xl">Lees verder!</a>
        </div>
    </div>
</header>

<hr class="seperateline">
@yield('content')

@include('layouts.components.js')
</body>
<script src="/js/app.js"></script>
</html>
