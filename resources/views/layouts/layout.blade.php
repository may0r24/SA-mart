<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SA-Mart</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- Styles -->
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="/css/main.css" rel="stylesheet" />
        
    </head>
    <body class="grey lighten-2">
    <div class="navbar-fixed">
        <nav class="nav-wrapper  indigo darken-2">
            <div class="container">
                <a href="/" class="brand-logo">SA-Mart</a>
                <a href="#" class="sidenav-trigger left" data-target="mobile-view">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#about" class="waves-effect wave-dark ">About</a></li>
                    <li><a href="#ordernow" class="waves-effect wave-dark ">Order Now</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <ul class="sidenav" id="mobile-view">
        <li><a href="#about" class="waves-effect wave-dark ">About</a></li>
        <li><a href="#ordernow" class="waves-effect wave-dark ">Order Now</a></li>
    </ul>

        @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.scrollspy').scrollSpy();
            $('select').formSelect();
            $('.parallax').parallax();
            $('.tabs').tabs();
        });
    </script>

    </body>
</html>