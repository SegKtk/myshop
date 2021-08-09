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
        <button class="nav-link active text-primary fw-bold" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tous</button>
        <button class="nav-link text-primary fw-bold" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Hommes</button>
        <button class="nav-link text-primary fw-bold" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Femmes</button>
        <button class="nav-link text-primary fw-bold" id="nav-enfants-tab" data-bs-toggle="tab" data-bs-target="#nav-enfants" type="button" role="tab" aria-controls="nav-enfants" aria-selected="false">Enfants</button>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="container">
            <div class="row justify-content-md-center border">
                <div class="col col-lg-2">
                1 of 3
                </div>
                <div class="col-md-auto">
                Variable width content
                </div>
                <div class="col col-lg-2">
                3 of 3
                </div>
            </div>
            <div class="row border-dark border">
                <div class="col">
                1 of 3
                </div>
                <div class="col">
                Variable width content
                </div>
                <div class="col">
                3 of 3
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
