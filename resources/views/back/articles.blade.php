@extends('back.layout')

@section('titre')
    <div class="container container-fluid border border-2 text-wrap badge-dark "    >
        <div class="row">
            <div class="col-sm-10  text-uppercase fs-5">
                Les articles
            </div>
            <!-- Button trigger modal -->
            <div class="col-sm-2 fs-5">
                <i class="nav-icon fas fa-plus-circle" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" > Créer</i>
            </div>
        </div>
    </div>
@endsection

@section('main')

<!----------------------------------- SI_INFOS ---------------------------------->
@if(session()->has('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="nav-icon fas fa-info "> {{ session('info') }} </i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has('info-red'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="nav-icon fas fa-info "> {{ session('info-red') }} </i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
{{--
@if(session()->has('info'))
    <div class="alert alert-success" role="alert">
        <i class="nav-icon fas fa-info "> {{ session('info') }} </i>
    </div>
@endif
--}}
<!----------------------------------- TABLEAU ---------------------------------->
<!----------------------------------- TABLEAU ---------------------------------->
<!----------------------------------- TABLEAU ---------------------------------->

<div class="container container-fluid">
    <hr>
    <div class="row">
        <table id="dtBasicExample" class="table table-striped table-responsive-lg table-dark table-hover table-bordered table-sm" cellspacing="0" width="100%">
            <thead >
                <tr>
                <th scope="col" class="th-sm">id</th>
                <th scope="col" class="th-sm">Nom</th>
                <th scope="col" class="th-sm">Prix</th>
                <th scope="col" class="th-sm">Quantite</th>
                <th scope="col" class="th-sm">Catégorie</th>
                <th scope="col" class="th-sm">Type</th>
                <th scope="col" class="th-sm">Description</th>
                <th scope="col" class="th-sm">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <th scope="row" class="fw-bold">{{ $article->id }}</th>
                    <td >{{ $article->nom }}</td>
                    <td>{{ $article->prix }}</td>
                    <td>{{ $article->qte_stock }}</td>
                    @foreach ($categories as $category)
                        @if ($article->id_categorie == $category->id)
                            <td>{{ $category->nom }}</td>

                        @endif

                    @endforeach
                    @foreach ($types as $type)
                        @if ($article->id_typeArticle == $type->id)
                            <td>{{ $type->nom }}</td>

                        @endif

                    @endforeach
                    <td>{{ $article->description }}</td>
                    <td>

                        <i class="nav-icon fas fa-edit w-25" type="submit" style="color: yellow;"></i></a>
                        <i class="nav-icon fas fa-eye w-25" type="button" style="color: blue-light;"></i>
                        <form action="{{ route('AdminArticle.destroy', ['AdminArticle'=>$article->id]) }}" method="POST" hidden>
                            @method('DELETE')
                            @csrf
                        </form>
                        <a href="{{ route('AdminArticle.destroy', ['AdminArticle'=>$article->id]) }}"
                            onclick="event.preventDefault(); this.previousElementSibling.submit();">
                            <i class="nav-icon fas fa-trash-alt w-25" type="button" style="color: red;" ></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>










<!----------------------------------- Modal ---------------------------------->
<!----------------------------------- Modal ---------------------------------->
<!----------------------------------- Modal ---------------------------------->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title " id="staticBackdropLabel">Ajoutez un article à votre boutique</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="container container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark text-white">Informations sur le produit</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('AdminArticle.store') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- -----------------------------NOM -->
                                <div class="form-group row">
                                    <label for="nom" class="col-md-4 col-form-label text-md-right">Nom du produit</label>

                                    <div class="col-md-6">
                                        <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <!-- -----------------------------PRIX -->

                                <div class="form-group row">
                                    <label for="prix" class="col-md-4 col-form-label text-md-right">Prix</label>

                                    <div class="col-md-6">
                                        <input id="prix" type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" required autocomplete="prix" autofocus>

                                            @error('prix')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <!-- ----------------------------- QUANTITE EN STOCK-->

                                <div class="form-group row">
                                    <label for="qte_stock" class="col-md-4 col-form-label text-md-right">Quantité :</label>

                                    <div class="col-md-6">
                                        <input id="qte_stock" type="number" class="form-control @error('qte_stock') is-invalid @enderror" name="qte_stock" value="{{ old('qte_stock') }}" required autocomplete="qte_stock">

                                        @error('qte_stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <!-- ----------------------------- Catégorie  -->

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Catégorie d'articles </label>

                                    <div class="form-floating col-md-6">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="categories">
                                            <option selected disabled>Choisissez une catégorie</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->nom }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Catégorie d'articles</label>
                                    </div>

                                </div>
                                <br>
                                <!-- -----------------------------TypeArticle -->
                                <div class="form-group row">
                                    <label for="type_articles" class="col-md-4 col-form-label text-md-right">Type d'articles </label>

                                    <div class="form-floating col-md-6">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="type_articles">
                                            <option selected disabled>Choisissez un type</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Types d'articles</label>
                                    </div>

                                </div>

                                <br>

                                <!-- -----------------------------PHOTO 1 -->
                                <div class="form-group row">
                                    <label for="photo1" class="col-md-4 col-form-label text-md-right">Photo1 </label>

                                    <div class="col-md-6">
                                        <input id="photo1" type="file" class="form-control @error('photo1') is-invalid @enderror" name="photo1" value="{{ old('photo1') }}" required autocomplete="photo1" autofocus>

                                        @error('photo1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <!-- -----------------------------PHOTO 2 -->
                                <div class="form-group row">
                                    <label for="photo2" class="col-md-4 col-form-label text-md-right">Photo2 </label>

                                    <div class="col-md-6">
                                        <input id="photo2" type="file" class="form-control @error('photo2') is-invalid @enderror" name="photo2" value="{{ old('photo2') }}" required autocomplete="photo2" autofocus>

                                        @error('photo2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <!-- ----------------------------- DESCRIPTION -->
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>


                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <!-- ----------------------------- -->
                                <hr>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-warning fw-bold text-dark">
                                        Ajouter
                                        </button>
                                        <button type="reset" class="btn btn-secondary fw-bold text-dark">
                                        Annuler
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quitter</button>
       {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
      </div>
    </div>
  </div>
</div>

@endsection

@section('myscript')
    <script type="text/javascript">
      $(document).ready(function () {
        $('#dtBasicExample').DataTable({
          "paging": true // false to disable pagination (or any other option)
        });
        $('.dataTables_length').addClass('bs-select');
      });
    </script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>

@endsection
