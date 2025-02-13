<?php
session_start();

if (!isset($_SESSION['dernier_compte'])) {
    header('Location: creer.php');
    exit();
}

$dernier_compte = $_SESSION['dernier_compte'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçu de Création de Compte</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }
        .info {
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 5px;
            background-color: #e9ecef;
            box-shadow: 0px 2px 4px rgba(0,0,0,0.1);
        }
        .info p {
            margin: 0;
            font-size: 16px;
            color: #495057;
        }
        .info p strong {
            color: #212529;
        }
        button {
            display: block;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reçu de Création de Compte</h2>
        <div class="info">
            <p><strong>Nom :</strong> <?= htmlspecialchars($dernier_compte['nom']) ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($dernier_compte['email']) ?></p>
            <p><strong>Type de compte :</strong> <?= htmlspecialchars($dernier_compte['type_compte']) ?></p>
            <p><strong>Devise :</strong> <?= htmlspecialchars($dernier_compte['devise']) ?></p>
            <p><strong>Numéro de compte :</strong> <?= htmlspecialchars($dernier_compte['numero_compte']) ?></p>
            <p><strong>Date de création :</strong> <?= htmlspecialchars($dernier_compte['date_creation']) ?></p>
        </div>
        <button onclick="window.print()" class="btn btn-primary">Imprimer</button>
    </div>
</body>
</html>
