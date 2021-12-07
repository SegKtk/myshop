<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('loginn/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('loginn/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('loginn/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('loginn/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('loginn/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('loginn/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('loginn/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('loginn/css/main.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('login/images/img-01.png')}}" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">

					<span class="login100-form-title">
						Connectez vous
					</span>
                    @csrf
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input id="email" class="input100 @error('email') is-invalid @enderror " type="email" name="email" required autocomplete="email" autofocus value="{{ old('email') }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="wrap-input100 validate-input @error('password') is-invalid @enderror" data-validate = "Password is required">
						<input id="password" class="input100" type="password" name="password" placeholder="Password" required autocomplete="current-password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Se connecter
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Aide :
						</span>
                        @if (Route::has('password.request'))
                            <a class=" txt1 btn btn-link" href="{{ route('password.request') }}">
                                Mot de passe oublié ?
                            </a>
                        @endif
					</div>

					<div class="text-center p-t-136">
                        <span class="txt1">
							Vous n'avez pas de compte ?
						</span>
						<a class="txt2" href="{{ route('register') }}">
							S'inscrire
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="{{asset('loginn/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('loginn/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('loginn/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('loginn/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('loginn/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('loginn/js/main.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
