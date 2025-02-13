<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Comptes Créés</title>
    <!-- Inclusion de Bootstrap depuis le CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Autres styles CSS personnalisés -->
    
</head>
<body>
        <h1 class="text-center my-4">Demandes soumises</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Objet</th>
                    <th scope="col">Fichier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'config.php';

                // Requête pour récupérer tous les comptes créés
                $sql = "SELECT * FROM recu";
                $result = $connexion->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['objet']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['fichier']) . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="11" class="text-center">Aucun fichier trouvé.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Inclusion de Bootstrap JS et dépendances Popper.js et jQuery depuis le CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
