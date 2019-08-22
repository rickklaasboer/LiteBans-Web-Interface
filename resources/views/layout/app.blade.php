<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} &mdash; @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

<div style="border-radius: .25rem" class="container mt-5">
    <nav style="border-radius: .25rem" class="navbar navbar-expand-lg navbar-dark bg-blue mb-3">
        <div class="container">
            <a class="navbar-brand" href="{{ url("/") }}">{{ config('app.name') }}</a>
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
                        <a class="nav-link" href="{{ url('/bans') }}">Bans <span class="badge">{{ $banscount }}</span></a>
                    </li>
                    <li class="nav-item @if(request()->routeIs('kick.*')) active @endif">
                        <a class="nav-link" href="{{ url('/kicks') }}">Kicks <span class="badge">{{ $kickscount }}</span></a>
                    </li>
                    <li class="nav-item @if(request()->routeIs('warning.*')) active @endif">
                        <a class="nav-link" href="{{ url('/warnings') }}">Warnings <span class="badge">{{ $warningscount }}</span></a>
                    </li>
                    <li class="nav-item @if(request()->routeIs('mute.*')) active @endif">
                        <a class="nav-link" href="{{ url('/mutes') }}">Mutes <span class="badge">{{ $mutescount }}</span></a>
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

    <p>&copy; {{ config('app.name') }}</p>
</div>

<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>