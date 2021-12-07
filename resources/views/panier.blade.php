@extends('layout.app')

@section('content')

    <div class="container-fluid" style="margin-top: 2.1cm">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-capitalize text-white">
                        <div class="row ">
                            <div class="col-md-1">
                                Mon panier
                            </div>
                            @if ($existe == true)
                                <div class="col-md-11 text-end">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Paiement
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content text-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">DESOLE !!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <span class=" fw-bold text-danger"> Une autre commande est en cours de livraison.</span> Vous ne pouvez passer aucune autre commande. Merci de patienter jusqu'à livraison.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">J'ai compris</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @else
                                @if ($count != 0 )
                                    <div class="col-md-11 text-end">
                                        <form action="{{ route('createCommande') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="prix_total" value="{{$STT}}">
                                            <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="field" value="test">
                                            {{--<button type="submit" class="btn btn-success" id="pay-btn">
                                            Paiement
                                            </button>--}}
                                            @php
                                                echo "<script src=\"https://cdn.fedapay.com/checkout.js?v=1.1.7\" data-public-key=\"pk_sandbox_Ogt7MzPM9SdLdSQj02OIX6Pi\" data-button-text=\"Paiement\" data-button-class=\"button-class btn-success btn fw-bold\" data-transaction-amount=\"".$STT."\" data-transaction-description=\"Paiement sur Seg-Shop pour le Client ayant ID =".Auth::user()->id."\" data-currency-iso=\"XOF\">";
                                                echo "</script>";
                                            @endphp
                                        </form>
                                    </div>
                                @endif

                            @endif

                        </div>

                    </div>
                    <div class="card-body cart">
                        @if ($count == 0)
                            <div class="col-sm-12 empty-cart-cls text-center"> <img src="{{ asset('images/panier.png') }}" width="130" height="130" class="img-fluid mb-4 mr-3 ">
                                <h3>Votre panier <strong class="text-primary"> Seg-Shop </strong> est vide.</h3>
                                <h4>Ajoutez-y des articles :)</h4> <a href="{{ route('home') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Aller en boutique !</a>
                            </div>
                        @else
                                <div class="row">
                                    <div class="container mb-4">
                                        <div class="row">

                                            <form action="{{ route('panier.update', ['panier'=> Auth::user()->id ]) }}" method="POST" id="form1">
                                                @method('PUT')
                                                @csrf
                                                <div class="col-12">
                                                    @include('flash::message')
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-success table-shopping-cart table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col"> </th>
                                                                    <th scope="col">Produits</th>
                                                                    <th scope="col" class="text-left">Quantity</th>
                                                                    <th scope="col" class="text-right">Prix Unité</th>
                                                                    <th> <a href="{{ route('erase_panier', [Auth::user()->id]) }}"> <input type="button" href="#" class=" btn btn-danger text-black" value="Vider"> </a>  </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody> {{-- Mettre les images 50x50 --}}
                                                                @foreach ($lists as $list)
                                                                    <tr>
                                                                        <td><img src="{{ $list->photo1 }}" width="50" height="50" /> </td>
                                                                        <td>{{ $list->nom }}</td>
                                                                        @foreach ($panier_articles as $pa)
                                                                            @if($pa->id_articles == $list->id)
                                                                                <td><input class="form-control" type="number" name="{{ $list->id }}" value="{{ $pa->quantite }}" min="1" max="{{  $list->qte_stock }}" maxlength="4" oninput="this.value=this.value.slice(0,this.maxLength)" style="width: 2cm;"/></td>
                                                                                @break
                                                                            @endif

                                                                        @endforeach
                                                                        <td class="text-right">{{ $list->prix }} XOF</td>
                                                                        <td class="text-right"><a href="{{route('deleteInPanier',['id' => Auth::user()->id, 'id_a' => $list->id])}}">
                                                                            <i class="fa fa-times text-dark"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach


                                                                <tr class="">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="bg-success fw-bold"><strong>TOTAL</strong></td>
                                                                    <td class="text-right bg-success"><strong>{{ $STT }} XOF</strong></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col mb-2">
                                                    <div class="row">
                                                        <div class="col-sm-12  col-md-6">
                                                            <a href="{{ route('home') }}">
                                                                <input type="button" value="Continuer mes achats">
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 text-end">
                                                            <div class="me-0">
                                                                    <input type="submit" class="btn btn-dark"  form="form1" value="Mises à jour">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
<hr>




@endsection

{{----}}
@section('custom_js')

@endsection
