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
            width: 500px !important;
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
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h1 class="card-title">Inscription</h1>
          <h6 class="card-subtitle mb-2 text-muted">Inscription Réussi !!!</h6>
          <p class="card-text">
            Bienvenu {{$user['name']}} sur Envoi sans frais<br/>
            Nous sommes ravis de vous accueillir sur Envoi sans frais ! C'est un plaisir de vous accueillir dans notre communauté en ligne.

            Votre inscription marque le début d'une expérience passionnante. Chez Envoisansfrais, nous nous efforçons de fournir un espace unique où vous pourrez décrir brièvement le but ou les avantages de notre site.
        </p>
        </div>
      </div>

  </body>
</html>
