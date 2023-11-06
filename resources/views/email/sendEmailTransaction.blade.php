
<!doctype html>
<html>
  <head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 400px !important;
            padding: 20px;
            background-color: #FEFEFE;
            border: 1px solid #7aecf8;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-title{
            text-decoration-color: #7aecf8 !important;
            font-size:20px;
        }
        .card-subtitle{
            text-decoration-color: #7aecf8 !important;
            font-size:13px;
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
            Visité sur {{ $url }}
        </p>
        </div>
      </div>

  </body>
</html>
