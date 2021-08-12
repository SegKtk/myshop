@extends('layouts.app')

@section('content')

<h3>Votre panier :</h3>

@if ($panier == 0)
    <p>Votre panier <strong class="text-primary"> Seg-Shop </strong>  est vide.</p>
@endif



<div class="progress" style="height: 1px;">
  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<br>{{date('d')}}
<div class="progress" style="height: 10px;">
  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
@endsection
