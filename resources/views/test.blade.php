<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>

</head>

<body>
<a href="{{ route('fedapay') }}">TESTONS</a>
<hr><hr><hr>
<br>

{{ base_path('vendor/fedapay/fedapay-php/lib/FedaPay.php'); }}
<button id="pay-btn">Payer 1000 FCFA</button>
  <script type="text/javascript">
      FedaPay.init('#pay-btn', {
        public_key: 'pk_live_DJ3ji_6dR8y6apGksLofZxrZ',
        transaction: {
          amount: 100,
          description: 'Acheter mon produit'
        },
        customer: {
          email: 'johndoe@gmail.com',
          lastname: 'Doe',
          firstname: 'John',
        }
      });
  </script>
</body>

</html>
