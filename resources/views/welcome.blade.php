@extends('layout.app')

@section('custom_style')
<!-- custom style -->
    <link href="{{ asset('ex1/css/ui.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('ex1/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    <link rel="stylesheet" href="{{ asset('ex1/css/customize.css') }}">
@endsection

@section('content')

    <!------------------- START - CAROUSEL ------------------->
    <div id="myCarousel" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/imm2.jpg')}}" class="d-block img-fluid" alt="...">

            <div class="container">
            <div class="carousel-caption text-start text-white fw-bold">
                <div class="col-4 float-start">
                    <img src="{{ asset('images/femme.jpeg')}}" class="img-fluid" alt="...">
                </div>
                <h1>Découvrez le luxe</h1>
                <p>Des Habits de grandes marques, des Pantalons hautement stylés, des Chaussures confortables et bien d'autres.</p>
                <p><a class="btn btn-lg btn-primary" href="{{ route('login') }}">S'inscrire maintenent</a></p>
            </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/imm1.jpg')}}" class="d-block img-fluid" alt="...">

            <div class="container mt-0">
            <div class="carousel-caption text-white fw-bold lead">
                <h1>Effectuez des achats en un clic</h1>
                <p>N'ayez pas peur. Nous assurons la sécurité vos achats et même leur livraisons.</p>
                <p><a class="btn btn-lg btn-primary" href="{{ route('home') }}">Découvrir</a></p>
            </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/imm.svg')}}" class="d-block img-fluid" alt="...">

            <div class="container">
            <div class="carousel-caption text-end text-white fw-bold">
                <div class="col-4 float-start">
                    <img src="{{ asset('images/chaussure1.png')}}" class="img-fluid w-100" alt="...">
                </div>
                <h1>Trouvez la paire qui vous convient</h1>
                <p>Nous vous proposons des chaussures de grandes marques.</p>
                <p><a class="btn btn-lg btn-primary" href="{{ route('getChau') }}">Voir plus</a></p>
            </div>
            </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!------------------- END - CAROUSEL ------------------->


    <div class="text-center">
        <h2>Nous proposons plusieurs catalogues à votre disposition.</h2><br>
    </div>
    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
        <div class="col-lg-4">
            <picture>
                <img src="{{ asset('images/pantalon.svg')}}" alt="" class="img-fluid rounded rounded-circle" style="height: 15rem;">
            </picture>

            <h2 class="text-dark fw-bold">Catalogue Pantalon</h2>
            <p>Vous trouverez des pantalons jeans Lewis avec un design à la mode mais cousus avec du pagne.</p>
            <p><a class="btn btn-dark" href="{{ route('getPan') }}">Consulter &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <picture>
                <img src="{{ asset('images/chaussure.svg')}}" alt="" class="img-fluid rounded rounded-circle" style="height: 15rem;">
            </picture>

            <h2 class="text-dark fw-bold">Catalogue Chaussure</h2>
            <p>Nike, Adidas, Puma, M10... autant de marques de chaussures mis à votre disposition .</p>
            <p><a class="btn btn-dark" href="{{ route('getChau') }}">Consulter &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <picture>
                <img src="{{ asset('images/habits.jpg')}}" alt="" class="img-fluid rounded rounded-circle" style="height: 15rem;">
            </picture>

            <h2 class="text-dark fw-bold">Catalogue Habits</h2>
            <p>Parcourez notre catalogue d'habits de tout genre : tee-shirts, chemises, body. </p>
            <p><a class="btn btn-dark" href="{{ route('getHabit') }} ">Consulter &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">
        <div class="text-center">
            <h1>Nos services</h1><br>
        </div>
        <div class="container justify-content-center">
            <div class="row lead">
                <div class="col-4">
                    <div class="border border-2">
                        <img src="{{ asset('images/paiement.svg')}}" alt="" class="img-fluid text-center rounded" style="height: 3cm; width:5cm;">
                    </div>

                    <h2 class=" text-decoration-underline ">Paiements sécurisés</h2>
                    <p class="text-center">
                       Un système de paiement fiable et sécurisé pour effectuer tous vos achats. Vous n'avez qu'à choisir votre mode de paiement.
                    </p>
                </div>
                <div class="col-4">
                    <div class="border border-2">
                        <img src="{{ asset('images/livraison.svg')}}" alt="" class="img-fluid text-center rounded" style="height: 3cm; width:10cm;">
                    </div>
                    <h2 class=" text-decoration-underline text-center">Livraison garantie</h2>
                    <p class="text-center">
                        Faîtes-vous livrez vos colis en restant chez vous. Le livreur vient avec votre colis bien emballé.
                    </p>
                </div>
                <div class="col-4">
                    <div class="border border-2">
                        <img src="{{ asset('images/treat.png')}}" alt="" class="img-fluid text-center rounded" style="height: 3cm;">
                    </div>
                    <h2 class=" text-decoration-underline text-center">Suivi des commandes</h2>
                    <p class="text-center">
                       Soignez informez de l'évolution de votre commande. Nous vous envoyons des mails de notifications jusqu'à livraison.
                    </p>
                </div>
            </div>

        </div>

        <hr class="featurette-divider">
        {{--
        <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
            <button type="button" class="btn btn-dark " >
                <i class="nav-icon fas fa-cart-plus "></i> Ajoutez maintenant
            </button>
            <button type="button" class="btn btn-secondary " >
                Détails
            </button>

        </div>
        <div class="col-md-5 border">
            <img src="{{ asset('storage/articles/01.jpg')}}" alt="" class="img-fluid d-block w-100">
        </div>
        </div>
        --}}

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->

@endsection

@section('custom_js')
    <!-- custom javascript -->
    <script src="{{ asset('ex1/js/script.js') }}" type="text/javascript"></script>

@endsection
