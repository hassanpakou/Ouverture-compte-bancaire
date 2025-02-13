<?php
include_once '../config/config.php';

class ModeleFichier {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    public function creerFichier($objet, $fichier) {
        // Requête pour insérer un nouveau compte
        $sql = "INSERT INTO recu (objet, fichier) VALUES (?, ?)";
        
        if ($stmt = $this->connexion->prepare($sql)) {
            // Liaison des paramètres
            $stmt->bind_param("sssssssss", $objet, $fichier);

            // Exécution de la requête
            if ($stmt->execute()) {
                echo "Fichier envoyé avec succès.";
            } else {
                die("Erreur lors de l'insertion : " . $stmt->error);
            }

            // Fermeture du statement
            $stmt->close();
        } else {
            die("Erreur de préparation de la requête SQL : " . $this->connexion->error);
        }
    }
}

?>
