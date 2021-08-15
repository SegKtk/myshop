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
            <img src="{{ asset('images/imm.svg')}}" class="d-block img-fluid" alt="...">

            <div class="container">
            <div class="carousel-caption text-start text-white text-bold">
                <div class="col-4 float-start">
                    <img src="{{ asset('images/femme.jpeg')}}" class="img-fluid" alt="...">
                </div>
                <h1>Des habits légers</h1>
                <p>Some representative placeholder content for the first slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
            </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/imm.svg')}}" class="d-block img-fluid" alt="...">

            <div class="container">
            <div class="carousel-caption">
                <div class="col-4 float-start">
                    <img src="{{ asset('images/femme.jpeg')}}" class="img-fluid" alt="...">
                </div>
                <h1>Du 100% coton</h1>
                <p>Some representative placeholder content for the second slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Voir plus</a></p>
            </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/imm.svg')}}" class="d-block img-fluid" alt="...">

            <div class="container">
            <div class="carousel-caption text-end">
                <h1>Trouvez des habits à votre taille</h1>
                <p>Some representative placeholder content for the third slide of this carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
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
        <h2>Nous proposons plusieurs catégories d'articles.</h2><br>
    </div>
    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
        <div class="col-lg-4">
            <picture>
                <img src="{{ asset('images/femme.jpeg')}}" alt="" class="img-fluid rounded rounded-circle">
            </picture>


            <h2>Catalogue Femme</h2>
            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
            <p><a class="btn btn-secondary" href="#">Consulter &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <picture>
                <img src="{{ asset('images/homme.jpeg')}}" alt="" class="img-fluid rounded rounded-circle">
            </picture>

            <h2>Catalogue Homme</h2>
            <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
            <p><a class="btn btn-secondary" href="#">Consulter &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <picture>
                <img src="{{ asset('images/enfant.jpeg')}}" alt="" class="img-fluid rounded rounded-circle">
            </picture>

            <h2>Catalogue Enfant</h2>
            <p>And lastly this, the third column of representative placeholder content.</p>
            <p><a class="btn btn-secondary" href="#">Consulter &raquo;</a></p>
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
                    <h2 class=" text-decoration-underline">Paiements  fiable & sécurisés</h2>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam, maiores sed. Tempora consequuntur quo ullam veniam quia eligendi quibusdam asperiores! Aut nulla temporibus consequuntur, omnis earum tempore ipsum sunt asperiores?
                    </p>
                </div>
                <div class="col-4">
                    <h2 class=" text-decoration-underline">Livraison garantie</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, expedita. Optio obcaecati vero, dignissimos ducimus voluptatem maxime quibusdam natus, labore eos eaque neque et! Doloremque quis consequatur eos ducimus maiores!
                    </p>
                </div>
                <div class="col-4">
                    <h2 class=" text-decoration-underline">Livraison garantie</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil amet et ullam aut, tenetur, iste magni voluptatibus blanditiis doloribus numquam facere esse beatae soluta reprehenderit harum nam! Dignissimos, accusamus temporibus?
                    </p>
                </div>
            </div>

        </div>
        <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
            <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
        </div>
        <div class="col-md-5">
            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

        </div>
        </div>


        <hr class="featurette-divider">

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

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->

@endsection

@section('custom_js')
    <!-- custom javascript -->
    <script src="{{ asset('ex1/js/script.js') }}" type="text/javascript"></script>

@endsection
