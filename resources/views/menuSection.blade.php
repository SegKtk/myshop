<!-- Start menu section -->
@extends('laYout')
@section('menu')
    <section id="aa-menu-area">
        <nav class="navbar navbar-default main-navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- LOGO -->
            <!-- Text based logo -->
            <a class="navbar-brand aa-logo" href="{{route('home')}}"> Accueil <!--<span>Property</span> --></a>
            <!-- Image based logo -->
            <!-- <a class="navbar-brand aa-logo-img" href="index.html"><img src="img/logo.png" alt="logo"></a> -->
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Soumettre une annonce <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('home')}}">Déposer une annonce</a></li>
                    <li><a href="{{route('home')}}">Connectez-vous à votre espace si vous avez déjà un compte</a></li>
                </ul>
                </li>
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}">Louer <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <nav class="navbar navbar-default main-navbar" role="navigation">
                        <div class="container">
                            <div id="navbar" class="navbar-collapse collapse">
                            <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Louer un bien <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('home')}}">Location maison</a></li>
                                    <li><a href="{{route('home')}}">Location appartement</a></li>
                                    <li><a href="{{route('home')}}">Location Parking</a></li>
                                    <li><a href="{{route('home')}}">Location Locaux Professionels</a></li>
                                    <li><a href="{{route('home')}}">Tous nos biens en location</a></li>
                                    <li><a href="{{route('home')}}">Location Immobilier d'execption</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Nos conseils <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('home')}}">Conseils pour la location</a></li>
                                    <li><a href="{{route('home')}}">Trouver ma location</a></li>
                                    <li><a href="{{route('home')}}">Résilier un bail</a></li>
                                    <li><a href="{{route('home')}}">Emménager</a></li>
                                    <li><a href="{{route('home')}}">Location Vacances</a></li>
                                    </ul>
                                </li>
                            </ul>
                            </div>
                        </div>
                        </nav>
                    </ul>
                </li>
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}">Vendre<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <nav class="navbar navbar-default main-navbar" role="navigation">
                        <div class="container">
                            <div id="navbar" class="navbar-collapse collapse">
                            <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Vendre un bien <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('home')}}">Soumettre une annonce</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Nos conseils <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('home')}}">Conseils pour vendre un bien</a></li>
                                    <li><a href="{{route('home')}}">Mon estimation immobilière</a></li>
                                    <li><a href="{{route('home')}}">Mes diagnostics obligatoires</a></li>
                                    <li><a href="{{route('home')}}">Je vends</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Outils <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('home')}}">Trouver votre déménageur</a></li>
                                    <li><a href="{{route('home')}}">Estimer votre bien immobilier</a></li>
                                    </ul>
                                </li>
                            </ul>
                            </div>
                        </div>
                        </nav>
                    </ul>
                </li>
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}">Acheter <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <nav class="navbar navbar-default main-navbar" role="navigation">
                        <div class="container">
                            <div id="navbar" class="navbar-collapse collapse">
                            <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Acheter un bien <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('home')}}">Appartement à vendre</a></li>
                                    <li><a href="{{route('home')}}">Maisons à vendre</a></li>
                                    <li><a href="{{route('home')}}">Tous nos biens à vendre</a></li>
                                    <li><a href="{{route('home')}}">Immobiliers neuf</a></li>
                                    <li><a href="{{route('home')}}">Immobiliers d'exception</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Nos conseils <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('home')}}">Conseils pour acheter</a></li>
                                    <li><a href="{{route('home')}}">Rechercher un bien</a></li>
                                    <li><a href="{{route('home')}}">Se préparer à l'achat</a></li>
                                    <li><a href="{{route('home')}}">Emménager</a></li>
                                    <li><a href="{{route('home')}}">J'achète</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Financer <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('home')}}">Location maison</a></li>
                                    <li><a href="{{route('home')}}">Conseils pour le financement</a></li>
                                    <li><a href="{{route('home')}}">Frais d'assurance</a></li>
                                    <li><a href="{{route('home')}}">Crédit immobilier</a></li>
                                    <li><a href="{{route('home')}}">Les aides au logement</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Outils <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('home')}}">Simuler un prêt immobilier</a></li>
                                    <li><a href="{{route('home')}}">Calculer le coût de l'assurance</a></li>
                                    <li><a href="{{route('home')}}">Simulateur Pinel</a></li>
                                    <li><a href="{{route('home')}}">Garantir son prêt</a></li>
                                    </ul>
                                </li>
                            </ul>
                            </div>
                        </div>
                        </nav>
                    </ul>
                </li>
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}"> Collocataire <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('home')}}">maison</a></li>
                    <li><a href="{{route('home')}}">Hôtel</a></li>
                </ul>
                </li>
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}">Les biens <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('home')}}">Les biens</a></li>
                    <li><a href="{{route('home')}}">Détaille sur les biens</a></li>
                </ul>
                </li>
                <li><a href="{{route('home')}}">GALLERY</a></li>
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}">BLOG <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('home')}}">BLOG</a></li>
                    <li><a href="{{route('home')}}">BLOG DETAILS</a></li>
                </ul>
                </li>
                <li><a href="{{route('home')}}">CONTACTES</a></li>
            <!-- <li><a href="{{route('home')}}">404 PAGE</a></li> -->
            </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>
    </section>
@endsection

  <!-- End menu section -->
