<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shop</title>

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

<body>
<!------------------- START - NAVBAR ------------------->
<nav class="navbar navbar-expand-lg  navbar-light bg-light fixed-top shadow ">
    <div class="container-fluid">
        <a class="navbar-brand text-bold"  href="{{ url('/') }}" style="font-family: 'Zen Tokyo Zoo';">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ktk">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">ACCEUIL</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">LA BOUTIQUE</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="#">A PROPOS</a>
                </li>
                @php
                    use Illuminate\Support\Facades\DB;
                    $ctg = DB::select('select * from categories');
                @endphp

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nos Catalogues
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        @foreach ($ctg as $category)
                            <li><a class="dropdown-item" href="#">{{ $category->nom }}</a></li>
                        @endforeach
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">A venir</a></li>
                    </ul>
                </li>
            </ul>
            @auth
                @php
                    $panier_count = DB::table('paniers')
                        ->where('id_users',Auth::user()->id)
                        ->count();
                @endphp
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Commandes et Retours</a>
                    </li>
                    <a href="{{ route('panier.show',['panier' => Auth::user()->id]) }} " class="nav-item ms-2">
                    <button type="button" class="btn btn-dark position-relative" >
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $panier_count }}
                        </span>
                    </button>
                </a>
                </ul>
            @endauth

            <span class="navbar-text ms-4">
                <span class="">Bienvenue @auth {{ Auth::user()->nom }} @endauth !</span>
                <div>
                    @auth
                        <form  id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                        </form>
                        <a class=""
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.previousElementSibling.submit();">
                            <i class="nav-icon fas fa-sign-out-alt ">Logout </i>
                        </a>
                    @else
                        <a href="{{ route('login') }}"><i class="nav-icon fa">Se connecter</i> |</a>
                        <a href="{{ route('register') }}"><i class="nav-icon fa">S'inscrire</i> </a>
                    @endauth


                </div>
            </span>
        </div>
    </div>
</nav>
<!------------------- END - NAVBAR ------------------->

@yield('content')

<!-- ========================= FOOTER ========================= -->
<footer class="bg-dark mt-5 padding-y text-white">
	<div class="container text-center">
        <div class="col">
            <p class="">
			    &copy Copyright 2019 All rights reserved
            </p>
            <a href="#"><i class="fab fa-facebook text-bold"> Facebook</i></a>
            <a href="#"><i class="fab fa-twitter"> Twitter</i></a>
            <a href="#"><i class="fab fa-google"> Google</i></a>
        </div>
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->



<!-- Bootstrap 5  Script -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

@yield('custom_js')
<!-- custom javascript -->
<script src="{{ asset('ex1/js/script.js') }}" type="text/javascript"></script>

</body>
</html>
