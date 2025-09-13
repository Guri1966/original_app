<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>カテゴリ一覧</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- @include('layouts.navigation') -->
        @include('layouts.header')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-0 px-0 sm:px-0 lg:px-0">
                {{ $header }}
            </div>
        </header>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <!-- sidebar -->
    @include('layouts.sidebar')

    <div class="main-content">
        @yield('content')
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>

</body>

</html>