@extends('back.layout')
{{--
@section('titre')
    <h1 class="m-0 text-dark">Les Commandes</h1>
@endsection
--}}
@section('titre')
    <div class="container container-fluid border border-2 text-wrap badge-dark "    >
        <div class="row">
            <div class="col-sm-10  text-uppercase fs-5">
                Les Commandes
            </div>
            <!-- Button trigger modal -->
            <div class="col-sm-2 fs-5">
                <i class="nav-icon fas fa-plus-circle" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" > Créer</i>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <div class="container-fluid">
        <hr>
        <div class="row">
            <form action="{{ route('updateC') }}" method="post">
                @csrf
                <table id="dtBasicExample" class="table table-striped table-responsive table table-hover table-bordered table-sm" cellspacing="0" width="100%">
                <thead class=" bg-info">
                    <tr class="fw-bold">
                    <th scope="col" class="th-sm">N°</th>
                    <th scope="col" class="th-sm">Confirmation</th>
                    <th scope="col" class="th-sm">DateC</th>
                    <th scope="col" class="th-sm">Préparation</th>
                    <th scope="col" class="th-sm">1er Envoi</th>
                    <th scope="col" class="th-sm">Date1E</th>
                    <th scope="col" class="th-sm">2nd Envoi</th>
                    <th scope="col" class="th-sm">Date2E</th>
                    <th scope="col" class="th-sm">Livraison</th>
                    <th scope="col" class="th-sm">Date Livraison</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($treats as $treat)
                    <tr>
                        <th scope="row" class=" fw-bold">{{ $treat->id_commande }}</th>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" @if($treat->confirmation) checked @endif name="{{$treat->id_commande.'C'}}">
                            </div>
                        </td>
                        @if ($treat->dateConfirmation)
                            <td>{{ $treat->dateConfirmation }}</td>
                        @else
                            <td><input type="date" name="{{$treat->id_commande.'dateC'}}"></td>
                        @endif
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" @if($treat->preparation) checked @endif name="{{$treat->id_commande.'P'}}">
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" @if($treat->firstSend) checked @endif name="{{$treat->id_commande.'FS'}}">
                            </div>
                        </td>
                        @if ($treat->dateFS)
                            <td>{{ $treat->dateFS }}</td>
                        @else
                            <td><input type="date" name="{{$treat->id_commande.'dateFS'}}"></td>
                        @endif
                        <td >
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" @if($treat->secondSend) checked @endif name="{{$treat->id_commande.'SS'}}">
                            </div>
                        </td>
                        @if ($treat->dateSS)
                            <td>{{ $treat->dateSS }}</td>
                        @else
                            <td><input type="date" name="{{$treat->id_commande.'dateSS'}}"></td>
                        @endif
                        <td >
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" @if($treat->estLivre) checked @endif name="{{$treat->id_commande.'EL'}}">
                            </div>
                        </td>
                        @if ($treat->dateEL)
                            <td>{{ $treat->dateEL }}</td>
                        @else
                            <td><input type="date" name="{{$treat->id_commande.'dateEL'}}"></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="submit" value="Save Changes">
            </form>

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
