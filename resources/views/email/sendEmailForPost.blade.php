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
    <div class="message-container info">
        <h2>Information</h2>
        <p>
            Cher <strong>{{$contact->name}} </strong>,
            J'espère que vous allez bien. Je voulais simplement vous informer que j'ai effectué un nouveau post sur un envoi d'argent disponible maintenant.
            N'hésitez pas à me contacter pour une transaction.
            Regarder l'annonce sur ce lien {{ $url }}
            Prenez bien soin de vous.
            Cordialement.
        </p>
    </div>
  </body>
</html>
