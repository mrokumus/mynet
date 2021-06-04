<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>
<body class="font-sans antialiased">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand text-white" href="#">Mynet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Route::has('login'))
                    <div class="sm:block ">
                        @auth
                            <a href="{{ route('dashboard.render') }}"
                               class="btn btn-primary text-sm text-gray-700 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-secondary text-sm text-gray-700 underline">Log
                                in</a>
                        @endauth
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>
<main class="container">
    @yield('content')
</main>
<script src="{{ mix('js/app.js') }}" defer></script>
@yield('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
