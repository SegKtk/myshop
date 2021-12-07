@extends('layout.app')

@section('custom_style')

<style>
    .second {
        width: 100%;
        background-color: white;
        border-radius: 4px;
        box-shadow: 10px 10px 5px #aaaaaa;
    }

.text1 {
    font-size: 13px;
    font-weight: 500;
    color: #56575b;
}

.text2 {
    font-size: 13px;
    font-weight: 500;
    margin-left: 6px;
    color: #56575b;
}

.text3 {
    font-size: 13px;
    font-weight: 500;
    margin-right: 4px;
    color: #5c5959;
}

.text3o {
    color: #00a5f4;
}

.text4 {
    font-size: 13px;
    font-weight: 500;
    color: #828386;
}

.text4i {
    color: #00a5f4;
}

.text4o {
    color: white;
}

.thumbup {
    font-size: 13px;
    font-weight: 500;
    margin-right: 5px;
}

.thumbupo {
    color: #17a2b8;
}
</style>
@endsection
@section('content')

<!--Main layout-->
  <main class="mt-5 pt-4 border border-5" >
    <div class="container mt-5">
        @foreach ($articles as $article)
            <!--Grid row-->
            <div class="row justify-content-center">
                <!--Grid column-->
                <div class="col-md-3 mb-4 ">
                <img src="{{ $article->photo1 }}" class="img-fluid w-100 text-center border-end  border-danger border-2 rounded rounded-2 shadow" alt="">
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-9 mb-4">
                    <!--Content-->
                    <div class="p-4">
                        <div class="mb-3">
                            @foreach ($ctgs as $ctg)
                                @if ($ctg->id == $article->id_categorie)
                                    <button class="btn btn-warning border-dark">{{$ctg->nom}}</button>
                                @endif
                            @endforeach
                            @foreach ($types as $type)
                                @if ($type->id == $article->id_typeArticle)
                                    <button class="btn btn-dark">{{ $type->nom }}</button>
                                @endif
                            @endforeach

                        </div>
                        <div class="lead text-lg-start fw-bold">
                            <span>{{$article->nom}} </span>
                        </div>
                        <div class="lead fw-bold">
                            Prix : <span>{{$article->prix}} XOF</span>
                        </div>

                        <div class="lead fw-bold">
                            Restants : {{$article->qte_stock}}
                        </div>
                        <div class="lead fw-bold">
                            Description :
                        </div>
                        <p>
                            {{$article->description}}
                        </p>
                        <form class="d-flex justify-content-left" action="{{ route('adds') }}" method="POST">
                            <!-- Default input -->
                            @csrf
                            <input type="hidden" name="id_user" value="@auth{{ Auth::user()->id }}@else -1 @endauth">
                            <input type="hidden" name="id_article" value="{{ $article->id }}">
                            <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px" min="1" max="{{ $article->qte_stock }}" name="nbre" required maxlength="4" oninput="this.value=this.value.slice(0,this.maxLength)">
                            <button class="btn ms-1 btn-facebook" type="submit">Ajoutez au panier
                                <i class="fas fa-cart-plus ml-1"></i>
                            </button>

                        </form>

                        @auth<!-- Si l'User est authentifié, il peut noter l'article et laisser son commentaire -->
                        <!-- Button trigger modal -->
                        <a href="#"><p class=" mt-3 fw-bold text-black-25 text-primary text-decoration-underline btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">J'ai déjà utilisé ce produit et je souhaite donner mon appréciation.</p></a>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Evaluation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('createComment') }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        <input type="hidden" name="id_article" value="{{ $article->id }}">
                                        <input type="hidden" name="id_user"value="{{ Auth::user()->id }}">
                                        <div class="mb-3">
                                            <label for="Note">Note :</label>
                                            <select name="notes" id="notes" class="form-select" required>
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                                <option value="4" >4</option>
                                                <option value="5" selected>5</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="avis">Votre Appréciation : </label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Votre message" name="avis" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary" {{--data-bs-dismiss="modal"--}}>Annuler</button>
                                        <button type="submit" class="btn btn-primary">Envoyer   </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                        @endauth
                            <!--------------------LES COMMENTAIRES----------------------->
                            <!--------------------                ----------------------->
                            <!--------------------                ----------------------->
                            <!--------------------                ----------------------->
                            <!--------------------LES COMMENTAIRES----------------------->
                        <div class="accordion " id="accordionFlushExample">
                            <div class="accordion-item bg-light">
                                <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Voir les commentaires
                                </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body overflow-auto" @if($nbr_avis > 4) style="height: 10cm;" @endif>
                                    <div class="container justify-content-center mt-4 border-left border-right">
                                        @if ($comments)
                                        @foreach($comments as $comment)
                                        <div class="d-flex justify-content-center py-2">
                                            <div class="second py-2 px-2"> <span class="text-black-5">{{ $comment->avis }}</span>
                                                <div class="d-flex justify-content-between py-1 pt-2">
                                                    <div>
                                                        @php
                                                            $i = 5-$comment->notes;
                                                        @endphp
                                                        @while ($comment->notes)
                                                            <i class="fa fa-star" style="color: rgb(202, 202, 0);"></i>
                                                            @php
                                                                $comment->notes--;
                                                            @endphp
                                                        @endwhile
                                                        @while ($i!=0)
                                                            <i class="fa fa-star" style="color: rgb(131, 131, 126);"></i>
                                                            @php
                                                                $i--;
                                                            @endphp
                                                        @endwhile

                                                        @foreach ($users as $user)
                                                            @if ($user->id == $comment->id_users)
                                                                <span class="text2">{{ $user->nom }}</span>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div><span class="text3">{{ $comment->updated_at}}</span><span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                            <div class="second py-2 px-2 bg-info"> <span class="text-black fw-bold">Aucun utilisateur n'a donné son avis sur ce produit.</span>
                                        @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Content-->
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
      @endforeach
      <hr>

        <!--Grid row-->
        <div class="row d-flex justify-content-center ">
            <!--Grid column-->
            <div class="col-md-6 text-center">
            <h4 class="my-4 h4">D'autres articles similaires</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit
                voluptates,
                quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>
            </div>
        </div>

        <!--Grid row-->
        <div class="row wow fadeIn m-4">
            @foreach ($similar_article as $similar)
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">
                    <a href="{{ route('articles.show', ['article' => $similar->id]); }}"><img src="{{ $similar->photo1 }}" sizes="4x4" class="img-fluid w-10" alt="" style="height: 18rem; width:100%;"></a>
                </div>
            @endforeach
        </div>
    </div>
  </main>
  <!--Main layout-->
@endsection
