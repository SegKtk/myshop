@extends('layout.app')

@section('custom_style')
<link rel="stylesheet" href="{{asset('css/stepper.css')}}">
<style>

</style>

@endsection

@section('content')


@if ($treats)
    <div class="container  border-start border-warning rounded rounded-4 border-5  shadow " style="margin-top: 2.2cm; height" >
    <h3 class=" text-black fw-bold">
    <i class="fa fa-box" style="color: orange;"><span class=" text-dark"> commande N° {{ $cible }}</span></i>
    </h3>


    @foreach ($treats as $treat)
        <div class="stepper-wrapper text-center" >
            @if ($treat->confirmation == true && $treat->preparation == false)
                <div class="stepper-item completed ">
                    <div class="step-counter border border-3">1</div>
                    <div class="step-name">Paiement effectué (OK)  <br>
                        <div class="text-center fw-bold">{{ $treat->dateConfirmation }}</div>
                    </div>
                </div>
                <div class="stepper-item active">
                    <div class="step-counter border border-3">2</div>
                    <div class="step-name text-center">Préparation de la commande (En cours)</div>
                </div>
            @elseif($treat->confirmation == true && $treat->preparation == true)
                <div class="stepper-item completed ">
                    <div class="step-counter border border-3">1</div>
                    <div class="step-name">Paiement effectué (OK)  <br>
                        <div class="text-center fw-bold">{{ $treat->dateConfirmation }}</div>
                    </div>
                </div>
                <div class="stepper-item completed">
                    <div class="step-counter border border-3">2</div>
                    <div class="step-name text-center">Préparation de la commande (OK)</div>
                </div>
            @elseif($treat->confirmation == false)
                <div class="stepper-item active">
                    <div class="step-counter border border-3">1</div>
                    <div class="step-name">Paiement effectué (En cours)  <br>
                        {{ $treat->dateConfirmation }}
                    </div>
                </div>
                <div class="stepper-item">
                    <div class="step-counter border border-3">2</div>
                    <div class="step-name text-center">Préparation de la commande</div>
                </div>
            @endif

            @if($treat->firstSend == true && $treat->secondSend == false && $treat->estLivre == true)
                <div class="stepper-item completed">
                    <div class="step-counter border border-3">3</div>
                    <div class="step-name text-center">Livraison (En cours) <br>
                        <div class="text-center">
                            <i class="fa fa-check" style="color: green;"> 1er Envoi : {{ $treat->dateFS }}</i>
                        </div>
                    </div>
                </div>
            @elseif ($treat->firstSend == true && $treat->secondSend == false && $treat->estLivre == false)
                <div class="stepper-item active">
                    <div class="step-counter border border-3">3</div>
                    <div class="step-name text-center">Livraison (En cours) <br>
                        <div class="text-center">
                            <i class="fa fa-check" style="color: green;"> 1er Envoi : {{ $treat->dateFS }}</i>
                        </div>
                    </div>
                </div>
            @elseif($treat->firstSend == true && $treat->secondSend == true)
                <div class="stepper-item completed">
                    <div class="step-counter border border-3">3</div>
                    <div class="step-name text-center">Livraison (En cours) <br>
                        <div class="text-center">
                            <i class="fa fa-times" style="color: red;"> 1er Envoi : {{ $treat->dateFS }}</i><br>
                            <i class="fa fa-check" style="color: green;"> 2eme Envoi : {{ $treat->dateSS }}</i><br>
                        </div>
                    </div>
                </div>
            @elseif($treat->preparation == true && $treat->firstSend == false)
                <div class="stepper-item active">
                    <div class="step-counter border border-3">3</div>
                    <div class="step-name">Livraison (En cours)</div>
                </div>
            @else
                <div class="stepper-item">
                    <div class="step-counter border border-3">3</div>
                    <div class="step-name">Livraison</div>
                </div>
            @endif

            @if ($treat->estLivre == true)
                <div class="stepper-item completed">
                    <div class="step-counter border border-3">4</div>
                    <div class="step-name">Produit livré</div>
                    <div class="text-center fw-bold">
                        {{ $treat->dateEL }}
                    </div>
                </div>
            @else
                <div class="stepper-item">
                    <div class="step-counter border border-3">4</div>
                    <div class="step-name">Produit livré</div>

                </div>
            @endif

        </div>
    @endforeach
    <hr class=" shadow" style="border-top: 3px double #8c8b8b #daa700;"><br>
    <h5 class=" text-black fw-bold">
        <i class="fa fa-exclamation-circle" style="color: orange;"><span class=" text-dark"> Explication des Etapes</span></i>

    </h5>
    <dl class=" ms-4">
        <dt class=" text-success">Etape 1:</dt>
        <dd class=" ms-3">Nous confirmons que votre achat s'est bien déroulé jusqu'au paiement. Cette étape est franchie dès que nous reçevons votre ordre de paiement.</dd>
        <dt class=" text-success">Etape 2:</dt>
        <dd class=" ms-2">A cette étape, votre colis est pris en charge dans notre système. Une fois le colis, préparé, il sera remis au livreur pour son acheminement.</dd>
        <dt class=" text-success">Etape 3:</dt>
        <dd class=" ms-2">- Lors du premier envoi, votre colis est transmis au livreur qui est en charge. S'il n'arrive pas à vous livrer. Un autre transfert du colis est initié lors d'un autre jour de livraison.</dd>
        <dd class=" ms-2">- Si le premier aboutit envoi à un échec, un deuxième et dernier tranfert du colis est entamé.</dd>
        <dt class=" text-success">Etape 4:</dt>
        <dd class=" ms-2"> Le colis est arrivé à destination. Vous avez reçu votre commande de la part du livreur et signé la fiche de confirmation de réception. </dd>
    </dl>
    <br>
    <hr class=" shadow" style="border-top: 3px double #8c8b8b #daa700;">
    <a href="mailto:segla.kpatoukpa@imsp-uac.org?subject=Signalement de retour d'une commande" class="m-3">
        <i class="fa fa-exclamation-triangle" style="color: red"> Je voudrais signalez un retour !! </i>
    </a>
    <br>
</div>
<br>
@else
    <div class="container  border-start border-warning rounded rounded-4 border-5  shadow " style="margin-top: 2.2cm; height=10cm" >

        <hr class=" shadow" style="border-top: 3px double #8c8b8b #daa700;"><br>
        <h5 class=" text-black fw-bold">
            <i class="fa fa-exclamation-circle" style="color: orange;"><span class=" text-dark"> Explication des Etapes</span></i>

        </h5>
        <div class="fw-bold text-danger ms-3"> Vous n'avez aucune commande en cours de livraison. Néanmoins informez vous sur notre politique de livraison des commandes.</div>
        <div class="fw-bold text-dark ms-3"> Cette politique repose sur quatre étapes essentielles.</div>
        <dl class=" ms-4">
            <dt class=" text-success">Etape 1:</dt>
            <dd class=" ms-3">Nous confirmons que votre achat s'est bien déroulé jusqu'au paiement. Cette étape est franchie dès que nous reçevons votre ordre de paiement.</dd>
            <dt class=" text-success">Etape 2:</dt>
            <dd class=" ms-2">A cette étape, votre colis est pris en charge dans notre système. Une fois le colis, préparé, il sera remis au livreur pour son acheminement.</dd>
            <dt class=" text-success">Etape 3:</dt>
            <dd class=" ms-2">- Lors du premier envoi, votre colis est transmis au livreur qui est en charge. S'il n'arrive pas à vous livrer. Un autre transfert du colis est initié lors d'un autre jour de livraison.</dd>
            <dd class=" ms-2">- Si le premier aboutit envoi à un échec, un deuxième et dernier tranfert du colis est entamé.</dd>
            <dt class=" text-success">Etape 4:</dt>
            <dd class=" ms-2"> Le colis est arrivé à destination. Vous avez reçu votre commande de la part du livreur et signé la fiche de confirmation de réception. </dd>
        </dl>
        <br>
        <hr class=" shadow" style="border-top: 3px double #8c8b8b #daa700;">
        <a href="mailto:segla.kpatoukpa@imsp-uac.org?subject=Signalement de retour d'une commande" class="m-3">
            <i class="fa fa-exclamation-triangle" style="color: red"> Je voudrais signalez un retour !! </i>
        </a>
        <br>
    </div>
    <br><br><br><br>

@endif




@endsection
