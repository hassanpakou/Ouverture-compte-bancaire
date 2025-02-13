<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

include_once 'config.php';

// Vérifier que l'ID du fichier est présent dans la requête GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Requête pour récupérer le fichier correspondant à l'ID
    $sql = "SELECT * FROM fichiers WHERE id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filePath = $row['chemin'];

        // Vérifier si le fichier existe
        if (file_exists($filePath)) {
            // Forcer le téléchargement du fichier
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
            exit;
        } else {
            echo "Le fichier demandé n'existe pas.";
        }
    } else {
        echo "Fichier non trouvé.";
    }
} else {
    echo "ID de fichier invalide.";
}
?>
