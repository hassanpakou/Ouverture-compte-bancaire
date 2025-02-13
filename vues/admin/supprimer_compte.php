<?php
include_once 'config.php';

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer le compte de la base de données
    $sql = "DELETE FROM comptes WHERE id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Le compte a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du compte.";
    }

    header("Location: voir_comptes.php");
    exit;
} else {
    echo "ID manquant.";
    exit;
}
?>
