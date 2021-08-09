<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Seg-Shop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">

    <!-- Logo Site -->
    <link rel="icon" type="image/svg" sizes="16x16" href="{{ config('public_path()')."/images/icons/s.svg" }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background-image: url({{ asset('/images/icons/back1.jpg') }}); background-size: cover;" >

    <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-gradient shadow-sm fixed-top " style="height: 1.5cm">
            <div class="container container-fluid bg-primary bg-gradient">
                <a class="navbar-brand " href="{{ url('/') }}" style="font-family: 'Zen Tokyo Zoo';">
                    {{ config('app.name') }}
                </a>
                <a href="{{ url('/') }}" class=" fw-bold text-dark">Revenir à l'acceuil</a>


                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-flex">
                    <i class="fa fa-sign-in-alt"><a class=" link-dark" href="{{ route('login') }}"> Connexion</a></i>
                    <a class="link-dark ms-3" href="{{ route('register') }}"><strong> S'inscrire</strong></a>
                </div>

            </div>
        </nav>



        <main class="" style="margin-top: 3cm">
            @yield('content')
        </main>


</body>
</html>
