<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

include_once 'config.php';

// Requête pour récupérer tous les utilisateurs
$sql = "SELECT * FROM comptes";
$result = $connexion->query($sql);
?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Utilisateurs</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .user-image, .user-signature {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Liste des Utilisateurs</h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date de Naissance</th>
                    <th>Type de Compte</th>
                    <th>Devise</th>
                    <th>Numéro de Compte</th>
                    <th>Date de Création</th>
                    <th>Photo</th>
                    <th>Signature</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['nom']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['date_naissance']) ?></td>
                            <td><?= htmlspecialchars($row['type_compte']) ?></td>
                            <td><?= htmlspecialchars($row['devise']) ?></td>
                            <td><?= htmlspecialchars($row['numero_compte']) ?></td>
                            <td><?= htmlspecialchars($row['date_creation']) ?></td>
                            <td>
                                <?php if (!empty($row['photo'])): ?>
                                    <img src="/application-ouverture-compte/uploads/<?= htmlspecialchars($row['photo']) ?>" alt="Photo de l'utilisateur" class="user-image">
                                <?php else: ?>
                                    Aucune photo
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($row['signature'])): ?>
                                    <img src="/application-ouverture-compte/uploads/<?= htmlspecialchars($row['signature']) ?>" alt="Signature de l'utilisateur" class="user-signature">
                                <?php else: ?>
                                    Aucune signature
                                <?php endif; ?>
                            </td>
                            <td><a href="imprimer_utilisateur.php?id=<?= $row['id'] ?>" class="btn btn-secondary">Imprimer</a></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="11">Aucun utilisateur trouvé.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
