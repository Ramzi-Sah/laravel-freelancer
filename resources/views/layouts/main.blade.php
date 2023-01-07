<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family: sans-serif;
                margin: 50px;
            }
            .user-nav {
                display: inline;
                float: right;
            }
        </style>
    </head>
    <body class="antialiased">
        <script src="/js/bootstrap.bundle.min.js"></script>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        FreeRamzer
        @yield('navigation')

        <div class="user-nav">
            @guest
                <a href="{{ route('login') }}">login</a>
            @endguest
            @auth
                <a href="{{ route('logout') }}">{{ auth()->user()->name }}</a>
            @endauth
        </div>

        <br /><br />
        @yield('content')
    </body>
</html>
