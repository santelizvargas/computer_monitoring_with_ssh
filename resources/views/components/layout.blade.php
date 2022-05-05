<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>{{ $title ?? 'Computers' }}</title>
</head>

<body class="antialiased">
    <div class="loader"></div>
    <x-navbar></x-navbar>
    <div class="container">
        {{ $slot }}
    </div>
    <x-footer></x-footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut(1200);
    });
    </script>

</html>
