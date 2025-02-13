<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

include_once 'config.php';

// Requête pour récupérer tous les utilisateurs
$sql = "SELECT * FROM fichiers";
$result = $connexion->query($sql);
?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Fichiers</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Liste des Fichiers</h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Objet</th>
                    <th>Fichier</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['objet']) ?></td>
                            <td><?= htmlspecialchars($row['chemin']) ?></td>
                            <td><a href="telecharger.php?id=<?= $row['id'] ?>" class="btn btn-secondary">Télécharger</a></td>

                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="8">Aucun utilisateur trouvé.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
