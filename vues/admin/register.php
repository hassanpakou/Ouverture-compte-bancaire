<?php
// Connexion à la base de données (remplacez les valeurs par vos informations)
$host = 'localhost';
$dbname = 'comptes_bancaires';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Traiter le formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenir les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motDePasse = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT); // Hacher le mot de passe

    // Préparer et exécuter la requête d'insertion
    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nom' => $nom, 'email' => $email, 'mot_de_passe' => $motDePasse]);

    // Message de succès
    echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
}
?>
<?php include '../header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <h2>Inscription</h2>
    <form action="register.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="motDePasse">Mot de passe :</label>
        <input type="password" id="motDePasse" name="motDePasse" required>
        <br>
        <button type="submit">S'inscrire</button>
    </form>
    <p>Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
</body>
</html>
