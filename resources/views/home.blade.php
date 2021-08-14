@extends('layouts.app')

@section('content')

<nav style="margin-top: 1cm; " class="border-top border-dark">
    <div class="nav nav-tabs" id="nav-tab" role="tablist" style="background-color: #8eb0f0de;">
        <button class="nav-link active text-primary fw-bold " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tous</button>
        <button class="nav-link text-primary fw-bold" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Hommes</button>
        <button class="nav-link text-primary fw-bold" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Femmes</button>
        <button class="nav-link text-primary fw-bold" id="nav-enfants-tab" data-bs-toggle="tab" data-bs-target="#nav-enfants" type="button" role="tab" aria-controls="nav-enfants" aria-selected="false">Enfants</button>
    </div>
</nav>

{{--#########################################################################--}}
<div id="carouselExampleControls" class="carousel slide carousel-dark carousel-fade bg-secondary" data-bs-ride="carousel" >
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner " >
        <div class="carousel-item active">
            <img src="{{ asset('storage/articles/01.jpg')}}" class="d-block img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2 class=" bg-danger">First slide label</h2>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/articles/01.jpg')}}" class="d-block img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2 class=" bg-dark text-white">Second slide label</h2>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/articles/01.jpg')}}" class="d-block img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2 class=" bg-warning">Second slide label</h2>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

{{--#########################################################################--}}
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row row-cols-3 row-cols-md-5 g-2 p-1"  >
                @foreach ($articles as $article)
                    <div class="col">
                    <div class="card h-100 border-top border-top-1 bg-light">
                        <img src="{{ $article->photo1}}" class="card-img-top img-fluid" style="height: 15rem;"  alt="image d'article">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->nom }}</h5>

                            <div class="card-text">
                                <ul>
                                    <li>Prix : {{ $article->prix }} FCFA</li>
                                    <li>{{ $article->qte_stock }} restants</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="card-footer" style="margin-bottom: 0px;">
                                @auth
                                    <div class="btn btn-warning"><i class="fa fa-cart-plus"></i></div>
                                @endauth

                                <div class="btn btn-primary">Voir plus >></div>
                            </div>


                        </div>
                    </div>
                    </div>

                @endforeach

        </div>
    </div>

    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        CONTENT 2
    </div>

    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        CONTENT 3
    </div>

    <div class="tab-pane fade" id="nav-enfants" role="tabpanel" aria-labelledby="nav-enfants-tab">
        CONTENT 4
    </div>

</div>


{{--################################MODAL####################################--}}



@endsection
