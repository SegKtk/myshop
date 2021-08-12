@extends('layouts.app')

@section('content')
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenue sur notre plateforme de e-commerce!') }}
                </div>
            </div>
        </div>
    </div>
</div>
--}}
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
            <img src="{{ asset('storage/articles/91.jpg')}}" class="d-block img-fluid" alt="...">
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
<br>
{{--#########################################################################--}}
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="container container-md container-fluid">
            <div class="row row-cols-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header"><img src="{{ asset('storage/articles/01.jpg')}}" class="img-fluid" alt="..."></div>
                        <div class="card-body">
                            bien
                        </div>
                        <div class=" card-footer">
                            bb
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header"><img src="{{ asset('storage/articles/01.jpg')}}" class="img-fluid" alt="..."></div>
                        <div class="card-body">
                            bien
                        </div>
                        <div class=" card-footer">
                            bb
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header"><img src="{{ asset('storage/articles/01.jpg')}}" class="img-fluid" alt="..."></div>
                        <div class="card-body">
                            bien
                        </div>
                        <div class=" card-footer">
                            bb
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header"><img src="{{ asset('storage/articles/01.jpg')}}" class="img-fluid" alt="..."></div>
                        <div class="card-body">
                            bien
                        </div>
                        <div class=" card-footer">
                            bb
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header"><img src="{{ asset('storage/articles/01.jpg')}}" class="img-fluid" alt="..."></div>
                        <div class="card-body">
                            bien
                        </div>
                        <div class=" card-footer">
                            bb
                        </div>
                    </div>
                </div>
            </div>
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
{{ __('Bienvenue sur notre plateforme de e-commerce!') }}
@endsection
