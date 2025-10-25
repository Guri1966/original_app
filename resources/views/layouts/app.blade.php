<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title', 'デフォルトタイトル')</title>
    <script src="https://kit.fontawesome.com/2fe469bd53.js" crossorigin="anonymous"></script>
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