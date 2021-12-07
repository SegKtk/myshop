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
<body style="background-color: rgb(225, 231, 231);">

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light  bg-light bg-gradient shadow-sm fixed-top " style="height: 1.5cm">
            <div class="container ">
                <a class="navbar-brand  bg-transparent" href="{{ url('/') }}" style="font-family: 'Zen Tokyo Zoo';">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @php
                        use Illuminate\Support\Facades\DB;
                        $ctg = DB::select('select * from categories');
                    @endphp
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-uppercase" aria-current="page" href="{{ url('/') }}">Acceuil</a>
                        </li>

                        <li class="nav-item ms-4 ">
                            <div class="input-group " style="height: 1cm">
                                <div class="input-group-text " id="btnGroupAddon">Nos catalogues :</div>
                                <select name="categories" id="categories" class="bg-white form-control" placeholder="bla" style="width: 10rem">
                                    <option disabled>Choisissez un catalogue à consulter</option>
                                @foreach ($ctg as $category)
                                    <option value="{{ $category->nom }}">{{ $category->nom }}</option>
                                @endforeach
                                <div class="input-group-text " id="btnGroupAddon">Nos catégories :</div>
                                <input type="submit" href="#" value="Consulter" style="width: 3cm" class="form-control border">
                            </select>
                            </div>
                        </li>

                    </ul>
                    @auth
                        <strong href="#" class="active text-dark">
                            <i class="fa fa-user">{{ _('Bienvenue,')}}{{ Auth::user()->nom }}</i>
                        </strong>

                        <form  id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                        </form>
                        <a class="btn"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.previousElementSibling.submit();">
                            <i class="nav-icon fas fa-sign-out-alt ">Logout</i>
                        </a>
                       {{-- <a class="btn" href="#"><i class="nav-icon fas fa-shopping-cart"></i></a> --}}

                       <a href="{{ route('panier.show',['panier' => Auth::user()->id]) }} ">
                       <button type="button" class="btn btn-dark position-relative" >
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                0
                            </span>
                        </button>
                        </a>


                    @else
                        <i class="fa fa-sign-in-alt"><a class=" link-dark" href="{{ route('login') }}"> Connexion</a></i>

                        <a class="link-dark ms-3" href="{{ route('register') }}"><strong> S'inscrire</strong></a>

                    @endauth


                </div>
            </div>
        </nav>
    </div>
        <main class="" style="margin-top: 1.5cm">
            @yield('content')
        </main>
</body>

</html>
