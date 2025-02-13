<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

include_once 'config.php';

// Vérifier si un ID d'utilisateur est passé dans l'URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Requête pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM comptes WHERE id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérifier si l'utilisateur existe
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Utilisateur non trouvé.";
        exit();
    }
} else {
    echo "Aucun utilisateur spécifié.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de l'Utilisateur</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .user-image, .user-signature {
            max-width: 200px;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin: 10px 0;
        }
        .user-info {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2 class="my-4">Reçu de l'Utilisateur</h2>
                <div class="user-info">
                    <p><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></p>
                    <p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
                    <p><strong>Date de Naissance :</strong> <?= htmlspecialchars($user['date_naissance']) ?></p>
                    <p><strong>Type de Compte :</strong> <?= htmlspecialchars($user['type_compte']) ?></p>
                    <p><strong>Devise :</strong> <?= htmlspecialchars($user['devise']) ?></p>
                    <p><strong>Numéro de Compte :</strong> <?= htmlspecialchars($user['numero_compte']) ?></p>
                    <p><strong>Date de Création :</strong> <?= htmlspecialchars($user['date_creation']) ?></p>
                </div>
                <!-- Affichage de la photo -->
                <div class="user-info">
                    <?php if (!empty($user['photo'])): ?>
                        <p><strong>Photo :</strong></p>
                        <img src="/application-ouverture-compte/uploads/<?= htmlspecialchars($user['photo']) ?>" alt="Photo de l'utilisateur" class="user-image">
                    <?php else: ?>
                        <p><strong>Photo :</strong> Aucune photo</p>
                    <?php endif; ?>
                </div>

                <!-- Affichage de la signature -->
                <div class="user-info">
                    <?php if (!empty($user['signature'])): ?>
                        <p><strong>Signature :</strong></p>
                        <img src="/application-ouverture-compte/uploads/<?= htmlspecialchars($user['signature']) ?>" alt="Signature de l'utilisateur" class="user-signature">
                    <?php else: ?>
                        <p><strong>Signature :</strong> Aucune signature</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <button onclick="window.print()" class="btn btn-primary mt-4">Imprimer</button>
    </div>
</body>
</html>
