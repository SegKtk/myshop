@extends('layout.connect')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de vérification vient d\'être envoyé à votre addresse mail .') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, vérifiez dans vos mails pour reçevoir de message de confirmation .') }}
                    {{ __('Si vous n\'avez pas reçu de mails ') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquez ici.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
