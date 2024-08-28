<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    @php
        $publicRoute = route('public.') . '/';
    @endphp

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ $publicRoute }}css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ $publicRoute }}css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ $publicRoute }}css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ $publicRoute }}css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ $publicRoute }}css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ $publicRoute }}css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ $publicRoute }}css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ $publicRoute }}css/style.css" type="text/css">

    <script defer src="{{ $publicRoute }}js/alpine.min.js"></script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <x-header />

    {{ $slot }}

    <x-footer />

    <!-- Js Plugins -->
    <script src="{{ $publicRoute }}js/jquery-3.3.1.min.js"></script>
    <script src="{{ $publicRoute }}js/bootstrap.min.js"></script>
    <script src="{{ $publicRoute }}js/jquery.nice-select.min.js"></script>
    <script src="{{ $publicRoute }}js/jquery-ui.min.js"></script>
    <script src="{{ $publicRoute }}js/jquery.slicknav.js"></script>
    <script src="{{ $publicRoute }}js/mixitup.min.js"></script>
    <script src="{{ $publicRoute }}js/owl.carousel.min.js"></script>
    <script src="{{ $publicRoute }}js/main.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</body>

</html>
