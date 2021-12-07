@extends('template')
@section('contenu')
    <br>
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4 class="card-header">Envoi d'une photo</h4>
            <div class="card-body">
                <form action="{{ url('photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <div class="custom-file">
                          <input type="file" id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror">
                          <label class="custom-file-label" for="image" data-browse="Parcourir">Choisissez un fichier</label>
                          @error('image')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Envoyer !</button>
                </form>
            </div>
        </div>
    </div>
@endsection
