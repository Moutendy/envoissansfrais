<!doctype html>
<html>
  <head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .message-container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .info {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .warning {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
  </head>
  <body>
    <div class="card">
        <div class="card-body">
          <h1 class="card-title">New Transaction</h1>
          <p class="card-text">
            <br/>
            Cher <strong>{{$agencier['name']}} ,</strong>
            Nous sommes ravis de vous informer qu'une nouvelle transaction a été effectuée avec succès sur votre compte. 🎉
            <strong>Accepter et finaliser</strong> la transaction pour ameliorer votre profil d'agencier
            Visité sur {{ $url }}.<br/>
            <strong> IMPORTANT !!!</strong><br/>
            Renter en contact avec le client avant <strong>d'accepter la transaction</strong>.<br/>
            *<strong>Assurez vous qu'il a créée cette transaction numéro de la transaction</strong><br/>
            *<strong>Assurez vous des informations personnelles du client nom,tel ,email sur un réseau social (whatsapp...)</strong><br/>
        </p>
        </div>
      </div>
  </body>
</html>
