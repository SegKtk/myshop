@extends('layout.app')

@section('content')

<div class="container" style="margin-top: 2.3cm;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold border-end border-light border-2">Categories </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link underbarblue active" aria-current="page" href="
                        @if(Route::currentRouteName() == "home" || Route::currentRouteName() == "homeF" || Route::currentRouteName() == "homeE" || Route::currentRouteName() == "homeH")
                            {{ route('home') }}
                        @elseif(Route::currentRouteName() == "getHabit" || Route::currentRouteName() == "getHabitF" || Route::currentRouteName() == "getHabitE" || Route::currentRouteName() == "getHabitH")
                            {{ route('getHabit') }}
                        @elseif(Route::currentRouteName() == "getPan" || Route::currentRouteName() == "getPanF" || Route::currentRouteName() == "getPanE" || Route::currentRouteName() == "getPanH")
                            {{ route('getPan') }}
                        @elseif(Route::currentRouteName() == "getChau" || Route::currentRouteName() == "getChauF" || Route::currentRouteName() == "getChauE" || Route::currentRouteName() == "getChauH")
                            {{ route('getChau') }}
                        @endif
                    ">Tous</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link underbarblue active" aria-current="page" href="
                            @if(Route::currentRouteName() == "home" || Route::currentRouteName() == "homeF" || Route::currentRouteName() == "homeE" || Route::currentRouteName() == "searchArticle")
                                {{ route('homeH') }}
                            @elseif(Route::currentRouteName() == "getHabit" || Route::currentRouteName() == "getHabitF" || Route::currentRouteName() == "getHabitE")
                                {{ route('getHabitH') }}
                            @elseif(Route::currentRouteName() == "getPan" || Route::currentRouteName() == "getPanF" || Route::currentRouteName() == "getPanE")
                                {{ route('getPanH') }}
                            @elseif(Route::currentRouteName() == "getChau" || Route::currentRouteName() == "getChauF" || Route::currentRouteName() == "getChauE")
                                {{ route('getChauH') }}
                            @endif
                        ">Hommes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link underbarblue active" aria-current="page" href="
                            @if(Route::currentRouteName() == "home" || Route::currentRouteName() == "homeH" || Route::currentRouteName() == "homeE" || Route::currentRouteName() == "searchArticle")
                                {{ route('homeF') }}
                            @elseif(Route::currentRouteName() == "getHabit" || Route::currentRouteName() == "getHabitH" || Route::currentRouteName() == "getHabitE")
                                {{ route('getHabitF') }}
                            @elseif(Route::currentRouteName() == "getPan" || Route::currentRouteName() == "getPanH" || Route::currentRouteName() == "getPanE")
                                {{ route('getPanF') }}
                            @elseif(Route::currentRouteName() == "getChau" || Route::currentRouteName() == "getChauH" || Route::currentRouteName() == "getChauE")
                                {{ route('getChauF') }}
                            @endif
                        ">Femmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link underbarblue active" aria-current="page" href="
                            @if(Route::currentRouteName() == "home" || Route::currentRouteName() == "homeH" || Route::currentRouteName() == "homeF" || Route::currentRouteName() == "searchArticle")
                                {{ route('homeE') }}
                            @elseif(Route::currentRouteName() == "getHabit" || Route::currentRouteName() == "getHabitH" || Route::currentRouteName() == "getHabitF")
                                {{ route('getHabitE') }}
                            @elseif(Route::currentRouteName() == "getPan" || Route::currentRouteName() == "getPanH" || Route::currentRouteName() == "getPanF")
                                {{ route('getPanE') }}
                            @elseif(Route::currentRouteName() == "getChau" || Route::currentRouteName() == "getChauH" || Route::currentRouteName() == "getChauF")
                                {{ route('getChauE') }}
                            @endif
                        ">Enfants</a>
                    </li>
            </ul>

            <form class="d-flex" method="POST" action="{{ route('searchArticle') }}">
                @csrf
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit"> <i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
  </nav>
</div>



    <div class="container mt-2">
        <!--Section: Products v.3-->
        <section class="text-center mb-4">
            <!--Grid row-->
            <div class="row ">

                @foreach ($articles as $article)

                    @php
                        $tab_notes = array();
                        $moy = 0;
                        foreach ($comments as $valeur) {
                            if($valeur->id_articles == $article->id){
                                array_push($tab_notes, $valeur->notes);
                            }
                        }

                        $nbr_note = count($tab_notes) + 1;
                        if($nbr_note != 0){
                            $somme = array_sum($tab_notes) + 5;
                            $moy = (int) $somme / $nbr_note;
                        }
                    @endphp
                    <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card">
                    <!--Card image-->
                    <div class="">
                        <img src="{{ $article->photo1}}" class="card-img-top shadow"
                        class="card-img-top img-fluid" style="height: 18rem;"  alt="image d'article">
                    </div>
                    <!--Card image-->
                    <!--Card content-->
                    <div class="card-body text-center">
                        <!--Category & Title-->
                        <h5>{{ $article->nom }}</h5>
                        <h6>
                            @if ($moy >= 4.5)
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                            @elseif($moy >= 3.5)
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(167, 167, 161);"></i>
                            @elseif($moy >= 2.5)
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(167, 167, 161);"></i>
                                <i class="fa fa-star" style="color: rgb(167, 167, 161);"></i>
                            @elseif($moy >= 1.5)
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(167, 167, 161);"></i>
                                <i class="fa fa-star" style="color: rgb(167, 167, 161);"></i>
                                <i class="fa fa-star" style="color: rgb(167, 167, 161);"></i>
                            @elseif($moy == 0)
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                            @else
                                <i class="fa fa-star" style="color: rgb(235, 235, 19);"></i>
                                <i class="fa fa-star" style="color: rgb(167, 167, 161);"></i>
                                <i class="fa fa-star" style="color: rgb(167, 167, 161);"></i>
                                <i class="fa fa-star" style="color: rgb(167, 167, 161);"></i>
                                <i class="fa fa-star" style="color: rgb(167, 167, 161);"></i>
                            @endif
                        </h6>
                        <h4 class="">
                        <strong>{{ $article->prix}} XOF</strong>
                        </h4>

                        <form action="{{ route('addArticle') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_article" value="{{ $article->id }}" />
                                @auth
                                       <input type="hidden" name="id_user" value="{{ Auth::user()->id }}" />
                                @else
                                   <input type="hidden" name="id_user" value="-3" />
                                @endauth
                        </form>
                        <a href="{{ route('addArticle') }}"
                            onclick="event.preventDefault(); this.previousElementSibling.submit();">
                            <button type="submit" class="btn btn-dark">
                            <i class="nav-icon fas fa-cart-plus "> Ajoutez</i>
                            </button>
                        </a>
                        <a href="{{ route('articles.show', ['article' => $article->id]); }}">
                            <button type="submit" class="btn btn-secondary " >
                                Détails
                            </button>
                        </a>

                    </div>
                    <!--Card content-->
                    </div>
                    <!--Card-->
                </div>
                <!--Grid column-->
                @endforeach

                @if (Route::currentRouteName() == "searchArticle")

                @else
                    <div class="container container-fluid">
                         {{ $articles->links() }}
                    </div>
                @endif



            </div>
            <!--Grid row-->
        </section>
        <!--Section: Products v.3-->

    </div>





































{{--
<nav style="margin-top: 2cm; " class="border-top border-dark">
    <div class="nav nav-tabs" id="nav-tab" role="tablist" style="background-color: #8eb0f0de;">
        <button class="nav-link active text-primary fw-bold " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tous</button>
        <button class="nav-link text-primary fw-bold" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Hommes</button>
        <button class="nav-link text-primary fw-bold" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Femmes</button>
        <button class="nav-link text-primary fw-bold" id="nav-enfants-tab" data-bs-toggle="tab" data-bs-target="#nav-enfants" type="button" role="tab" aria-controls="nav-enfants" aria-selected="false">Enfants</button>
    </div>
</nav>

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

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row row-cols-3 row-cols-md-5 g-2 p-1"  >
                @foreach ($articles ?? '' as $article)
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
--}}



@endsection
