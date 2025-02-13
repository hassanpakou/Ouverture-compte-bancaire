<?php
include_once '../config/config.php'; // Assurez-vous que ce fichier définit $connexion correctement
include_once '../modeles/ModeleCompte.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $date_naissance = $_POST['date_naissance'];
    $type_compte = $_POST['type_compte'];
    $devise = $_POST['devise'];
    $photo = $_FILES['photo']['tmp_name'];
    $signature = $_FILES['signature']['tmp_name'];

    // Validation de l'âge (au moins 18 ans)
    $age = date_diff(date_create($date_naissance), date_create('today'))->y;
    if ($age < 18) {
        die("Vous devez avoir au moins 18 ans pour ouvrir un compte.");
    }

    // Gestion du déplacement des fichiers uploadés
    $dossier_uploads = '../uploads/';
    $chemin_photo = $dossier_uploads . basename($_FILES['photo']['name']);
    $chemin_signature = $dossier_uploads . basename($_FILES['signature']['name']);

    if (!move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_photo)) {
        die("Erreur lors du téléchargement de la photo.");
    }

    if (!move_uploaded_file($_FILES['signature']['tmp_name'], $chemin_signature)) {
        die("Erreur lors du téléchargement de la signature.");
    }

    // Enregistrement du compte
    try {
        // Création d'une instance de ModeleCompte en passant la connexion PDO
        $modeleCompte = new ModeleCompte($connexion);

        // Génération du numéro de compte
        $numero_compte = $modeleCompte->genererNumeroCompte();

        // Création du compte
        $modeleCompte->creerCompte($nom, $email, $mot_de_passe, $date_naissance, $type_compte, $devise, $chemin_photo, $chemin_signature, $numero_compte);

        // Enregistrement des données de compte dans la session pour l'affichage du reçu
        session_start();
        $_SESSION['dernier_compte'] = [
            'nom' => $nom,
            'email' => $email,
            'type_compte' => $type_compte,
            'devise' => $devise,
            'numero_compte' => $numero_compte,
            'date_creation' => date('Y-m-d H:i:s')
        ];

        header('Location: ../vues/compte/succes.php');
    } catch (PDOException $e) {
        die("Erreur lors de la création du compte : " . $e->getMessage());
    }
}
?>
