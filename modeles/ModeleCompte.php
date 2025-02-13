<?php
include_once '../config/config.php';

class ModeleCompte {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    public function genererNumeroCompte() {
        // Générer un numéro de compte unique de 12 chiffres
        $numero_compte = '';
        for ($i = 0; $i < 12; $i++) {
            $numero_compte .= mt_rand(0, 9);
        }
        return $numero_compte;
    }

    public function creerCompte($nom, $email, $mot_de_passe, $date_naissance, $type_compte, $devise, $photo, $signature, $numero_compte = null) {
        // Générer un numéro de compte unique si aucun numéro de compte n'est fourni
        if (is_null($numero_compte)) {
            $numero_compte = $this->genererNumeroCompte();
        }

        // Requête pour insérer un nouveau compte
        $sql = "INSERT INTO comptes (numero_compte, nom, email, mot_de_passe, date_naissance, type_compte, devise, photo, signature) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        if ($stmt = $this->connexion->prepare($sql)) {
            // Liaison des paramètres
            $stmt->bind_param("sssssssss", $numero_compte, $nom, $email, $mot_de_passe, $date_naissance, $type_compte, $devise, $photo, $signature);

            // Exécution de la requête
            if ($stmt->execute()) {
                echo "Compte créé avec succès.";
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
