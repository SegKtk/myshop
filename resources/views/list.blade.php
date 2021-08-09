<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ktk</title>
</head>
<body>
    FVS

    @foreach ($client as $user)
        <p>nom : {{  $user->nom    }}</p>

        @if ($user->isadmin)
            {{ 'est admin'}}
        @else
            {{ 'pas admin'}}
        @endif

    @endforeach
    <hr>
    <h4>{{ URL::asset('/storage/articles/lolo2.jpg') }}</h4>
    <p>LIEU0 : {{ asset('/storage/articles/lolo.jpg') }}</p>
    <p>LIEU1 : {{ url(config_path('images.path'))}}</p>
    <p>LIEU2 :  {{ config_path('images.path') }}</p>

    <img src="{{ asset('/storage/articles/lolo.jpg') }}" alt="image3">
    <img src="{{ URL::asset('/storage/articles/lolo2.jpg') }}" alt="image2">
    <img src="http://localhost:8000/storage/articles/lolo.jpg" alt="image0">


</body>
</html>
