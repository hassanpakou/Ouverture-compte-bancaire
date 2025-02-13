<?php
include_once 'config.php';
include '../header.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations actuelles du compte
    $sql = "SELECT * FROM comptes WHERE id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Compte non trouvé.";
        exit;
    }
} 
// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Formulaire soumis!"; // Débogage
    var_dump($_POST); // Débogage
    var_dump($_FILES); // Débogage

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];
    $type_compte = $_POST['type_compte'];
    $devise = $_POST['devise'];

    // Gestion de l'upload de la photo et de la signature
    $photo = $row['photo'];
    $signature = $row['signature'];

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photo);
    }

    if (isset($_FILES['signature']) && $_FILES['signature']['error'] == 0) {
        $signature = basename($_FILES['signature']['name']);
        move_uploaded_file($_FILES['signature']['tmp_name'], "uploads/" . $signature);
    }

    // Mise à jour du compte dans la base de données
    $sql = "UPDATE comptes SET nom = ?, email = ?, date_naissance = ?, type_compte = ?, devise = ?, photo = ?, signature = ? WHERE id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("sssssssi", $nom, $email, $date_naissance, $type_compte, $devise, $photo, $signature, $id);

    if ($stmt->execute()) {
        echo "Le compte a été mis à jour avec succès.";
        // header("Location: comptes_crees.php"); // Pour vérifier si la redirection est le problème
        exit;
    } else {
        echo "Erreur lors de la mise à jour du compte.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Compte</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Modifier le Compte</h1>
        <form method="POST" action="modifier_compte.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($row['nom']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de Naissance</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo htmlspecialchars($row['date_naissance']); ?>" required>
            </div>
            <div class="form-group">
                <label for="type_compte">Type de Compte</label>
                <input type="text" class="form-control" id="type_compte" name="type_compte" value="<?php echo htmlspecialchars($row['type_compte']); ?>" required>
            </div>
            <div class="form-group">
                <label for="devise">Devise</label>
                <input type="text" class="form-control" id="devise" name="devise" value="<?php echo htmlspecialchars($row['devise']); ?>" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="signature">Signature</label>
                <input type="file" class="form-control-file" id="signature" name="signature">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
