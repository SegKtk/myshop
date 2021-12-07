@extends('back.layout')


@section('titre')
    <h1 class="m-0 text-dark">Les utilisateurs</h1>
@endsection

@section('main')
    <div class="container-fluid">
        <hr>
        <div class="row">
            <table id="dtBasicExample" class="table table-striped  table-responsive-lg table-dark table-hover table-bordered table-sm" cellspacing="0" width="100%">
                <thead >
                    <tr>
                    <th scope="col" class="th-sm">id</th>
                    <th scope="col" class="th-sm">Nom</th>
                    <th scope="col" class="th-sm">Prenom</th>
                    <th scope="col" class="th-sm">Email</th>
                    <th scope="col" class="th-sm">Adresse</th>
                    <th scope="col" class="th-sm">Registred</th>
                    <th scope="col" class="th-sm">Admin</th>
                    <th scope="col" class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $client)
                    <tr>
                        <th scope="row">{{ $client->id }}</th>
                        <td >{{ $client->nom }}</td>
                        <td>{{ $client->prenom }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->addresse }}</td>
                        <td>{{ $client->created_at }}</td>
                        @if ($client->isadmin)
                            <td>ADMIN</td>
                        @else
                            <td>client</td>
                        @endif
                        <td>waitnuhdocnpnivbuonbkhvugvbnjkln</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
