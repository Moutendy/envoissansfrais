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
            width: 800px !important;
            height:400px !important;
            padding: 20px;
            background-color: #FEFEFE;
            border: 1px solid #7aecf8;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-title{
            color: #7aecf8 !important;
            font-size:20px;
        }
        .card-subtitle{
            text-decoration-color: #7aecf8 !important;
            font-size:13px;
        }
        .card-text{
            font-size:50px;
        }
    </style>
  </head>

  <body>
    <div class="card">
        <div class="card-body">
          <h1 class="card-title">New Post</h1>

          <p class="card-text">
            Cher <strong>{{$contact->name}} </strong>,
            J'espère que vous allez bien. Je voulais simplement vous informer que j'ai effectué un nouveau post sur un envoi d'argent disponible maintenant.
            N'hésitez pas à me contacter pour une transaction.
            Regarder l'annonce sur ce lien {{ $url }}
            Prenez bien soin de vous.
            Cordialement.
        </p>
        </div>
      </div>

  </body>
</html>
