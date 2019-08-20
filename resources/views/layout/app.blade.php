<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WegoNetwork &mdash; @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url("/") }}">WegoNetwork</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item @if(request()->routeIs('home')) active @endif">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item @if(request()->routeIs('ban.*')) active @endif">
                    <a class="nav-link" href="{{ url('/bans') }}">Bans <span class="badge">{{ $bans->count() }}</span></a>
                </li>
                <li class="nav-item @if(request()->routeIs('kick.*')) active @endif">
                    <a class="nav-link" href="{{ url('/kicks') }}">Kicks <span class="badge">{{ $kicks->count() }}</span></a>
                </li>
                <li class="nav-item @if(request()->routeIs('warning.*')) active @endif">
                    <a class="nav-link" href="{{ url('/warnings') }}">Warnings <span class="badge">{{ $warnings->count() }}</span></a>
                </li>
                <li class="nav-item @if(request()->routeIs('mute.*')) active @endif">
                    <a class="nav-link" href="{{ url('/mutes') }}">Mutes <span class="badge">{{ $mutes->count() }}</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <form action="/search" method="POST" class="form-inline">
                    @csrf
                    <input name="username" autocomplete="off" style="min-width: 240px;" class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form>
            </ul>
        </div>
    </div>
</nav>


@yield('content')

<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>