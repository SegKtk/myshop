<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EX1</title>

    <!-- Logo Site -->
    <link rel="icon" type="image/svg" sizes="16x16" href="{{ config('public_path()')."/images/icons/s.svg" }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">

    <!-- STYLES -->
        <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css')}} " rel="stylesheet">

    @yield('custom_style')
        <!-- custom style -->
    <link href="{{ asset('ex1/css/ui.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('ex1/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    <link rel="stylesheet" href="{{ asset('ex1/css/customize.css') }}">


</head>

<body style="background-image: url('{{asset('images/banner.svg')}}') ;">

    <div class="container text-center mt-5">
        @yield('content')
    </div>

<!-- Bootstrap 5  Script -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

@yield('custom_js')
<!-- custom javascript -->
<script src="{{ asset('ex1/js/script.js') }}" type="text/javascript"></script>

</body>

</html>
