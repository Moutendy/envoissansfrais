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
    <div class="message-container success">
        <h2>Inscription Réussi !!!!</h2>
        <p>Bienvenu <strong> {{$user['name']}} </strong>sur Envoi sans frais
            <br/>
            Nous sommes ravis de vous accueillir sur Envoi sans frais ! C'est un plaisir de vous accueillir dans notre communauté en ligne.

            Votre inscription marque le début d'une expérience passionnante. Chez Envoisansfrais, nous nous efforçons de fournir un espace unique où vous pourrez effectuer les transfert d'argent en tout securité sur notre site.</p>
    </div>
  </body>
</html>
