<?php
include_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $objet = $_POST['objet'];

    // Gestion du fichier PDF
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0) {
        $allowed = ['pdf' => 'application/pdf'];
        $filename = $_FILES['fichier']['name'];
        $filetype = $_FILES['fichier']['type'];
        $filesize = $_FILES['fichier']['size'];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed) || $filetype != $allowed[$ext]) {
            die("Erreur : Veuillez sélectionner un format de fichier valide.");
        }

        // Vérifie la taille du fichier - 5Mo maximum
        if ($filesize > 5 * 1024 * 1024) {
            die("Erreur : La taille du fichier est supérieure à la limite autorisée.");
        }

        // Définir le chemin de destination
        $uploadDir = __DIR__ . '/../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Définir le nom du fichier de destination
        $destination = $uploadDir . basename($filename);

        // Déplacement du fichier vers le dossier de destination
        if (move_uploaded_file($_FILES['fichier']['tmp_name'], $destination)) {
            // Préparation de la requête SQL
            $sql = "INSERT INTO fichiers (objet, chemin) VALUES (?, ?)";
            $stmt = $connexion->prepare($sql);

            // Vérification des erreurs lors de la préparation
            if ($stmt === false) {
                die("Erreur de préparation de la requête : " . $connexion->error);
            }

            $stmt->bind_param("ss", $objet, $destination);

            if ($stmt->execute()) {
                echo "Fichier uploadé et enregistré avec succès.";
            } else {
                echo "Erreur lors de l'exécution de la requête : " . $stmt->error;
            }

            $stmt->close(); // Fermer la déclaration
        } else {
            echo "Erreur lors de l'upload du fichier.";
        }
    } else {
        echo "Erreur : Aucun fichier sélectionné ou erreur lors du téléchargement.";
    }
}
?>
