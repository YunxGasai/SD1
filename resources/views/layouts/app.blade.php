<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', __('messages.app_title'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand navbar-white border-bottom bg-white mb-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">{{ __('messages.app_title') }}</a>
            <div class="navbar-nav ms-auto flex-row align-items-center gap-2">
                <span class="navbar-text small">{{ __('student.first_name') }} {{ __('student.last_name') }}</span>
                <button type="button" class="btn btn-sm btn-outline-secondary" disabled>{{ __('messages.nav_logout') }}</button>
            </div>
        </div>
    </nav>

    <main class="container pb-4">
        @yield('content')
    </main>
</body>
</html>
