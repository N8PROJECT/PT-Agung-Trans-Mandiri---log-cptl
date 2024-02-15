<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/partial/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partial/sidebar.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="app-container">
        @include('partial.header')
        <div class="app-content">
            @include('partial.sidebar')
            @yield('content')
        </div>
    </div>

    @yield('script')
</body>
</html>