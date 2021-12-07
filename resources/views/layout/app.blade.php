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

    <!-- custom style -->
    @yield('custom_style')
    <link href="{{ asset('ex1/css/ui.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('ex1/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    <link rel="stylesheet" href="{{ asset('ex1/css/customize.css') }}">
    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>

    <style>
        .underbar {
        color: #fff;
        text-decoration: none;
        position: relative;
        }
        .underbar:after {
        background: none repeat scroll 0 0 transparent;
        bottom: 0;
        content: "";
        height: 2px;
        left: 50%;
        position: absolute;
        background: black;
        transition: width 0.3s ease 0s, left 0.3s ease 0s;
        width: 0;
        }
        .underbar:hover:after {
        width: 100%;
        left: 0;
        }

        .underbarblue {
        color: rgb(253, 149, 14);
        text-decoration: none;
        position: relative;
        }
        .underbarblue:after {
        background: none repeat scroll 0 0 transparent;
        bottom: 0;
        content: "";
        height: 2px;
        left: 50%;
        position: absolute;
        background: rgb(19, 98, 246);
        transition: width 0.3s ease 0s, left 0.3s ease 0s;
        width: 0;
        }
        .underbarblue:hover:after {
        width: 100%;
        left: 0;
        }
    </style>

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
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                <a class="nav-link underbar  active" aria-current="page" href="{{ url('/') }}">ACCEUIL</a>
                </li>
                <li class="nav-item ">
                <a class="nav-link underbar active" href="{{ route('home') }}">LA BOUTIQUE</a>
                </li>
                <li class="nav-item">
                <a class="nav-link underbar active" href="#">A PROPOS</a>
                </li>
                {{--
                @php
                    use Illuminate\Support\Facades\DB;
                    $ctg = DB::select('select * from categories');
                @endphp
                --}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nos Catalogues
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        {{--
                        @foreach ($ctg as $category)
                            <li><a class="dropdown-item" href="#">{{ $category->nom }}</a></li>
                        @endforeach
                        ---}}
                        <li><a class="dropdown-item" href="{{ route('getHabit') }}">Habits</a></li>
                        <li><a class="dropdown-item" href="{{ route('getPan') }}">Pantalons</a></li>
                        <li><a class="dropdown-item" href="{{ route('getChau') }}">Chaussures</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">A venir</a></li>
                    </ul>
                </li>
            </ul>
            @auth
                @php
                    $acount = 0;
                    $panier_count = DB::select('select * from paniers where id_users = ?', [Auth::user()->id]);

                    foreach ($panier_count as $pc) {
                        $acount += $pc->quantite;
                    }
                @endphp
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active underbar fw-bold" aria-current="page" href="{{ route('mes_commandes', ['id' => Auth::user()->id]) }}"> Commandes et Retours</a>
                    </li>
                    <a href="{{ route('panier.show',['panier' => Auth::user()->id]) }} " class="nav-item ms-2">
                    <button type="button" class="btn btn-dark position-relative" >
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $acount }}
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
<footer class="footer bg-dark py-3 text-white m-auto" style="">
	<div class="container text-center">
        <div class="col">
            <p class="">
			  Seg-Shop  &copy Copyright 2021 Tous droits réservés
            </p>
            <a href="https://web.facebook.com/gezzruti" target="_blank"><i class="fab fa-facebook text-bold"> Facebook</i></a>
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
