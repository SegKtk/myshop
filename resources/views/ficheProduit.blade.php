@extends('layout.app')

@section('content')

<!--Main layout-->
  <main class="mt-5 pt-4">
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
                        <p class="lead">
                            <span>{{$article->prix}} FCFA</span>
                        </p>
                        <p class="lead">
                            Restants : {{$article->qte_stock}}
                        </p>
                        <p class="lead font-weight-bold">Description</p>
                        <p>
                            {{$article->description}}
                        </p>
                        <form class="d-flex justify-content-left">
                            <!-- Default input -->
                            <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px" min="1" max="47">
                            <button class="btn btn-primary btn-md my-0 ms-1" type="submit">Add to cart
                                <i class="fas fa-shopping-cart ml-1"></i>
                            </button>
                        </form>
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
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4">

          <img src="{{ asset('storage/articles/101.jpg') }}" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <img src="{{ asset('storage/articles/91.jpg') }}" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <img src="{{ asset('storage/articles/81.jpg') }}" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->




    </div>
  </main>
  <!--Main layout-->
@endsection
