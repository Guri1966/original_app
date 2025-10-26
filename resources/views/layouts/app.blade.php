<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title', 'デフォルトタイトル')</title>
    <!-- Font Awesome CDN  CSS版 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>
    <div>
        <!-- Page Heading -->
        <header>
            @yield('header')
        </header>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
    @if (!Request::is('quiz*'))
    <script src="{{ asset('js/main.js') }}"></script>
    @endif
</body>

</html>