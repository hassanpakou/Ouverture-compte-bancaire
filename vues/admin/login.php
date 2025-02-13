<?php
session_start();
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Requête pour vérifier les identifiants
    $sql = "SELECT * FROM administrateurs WHERE email = ? AND mot_de_passe = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("ss", $email, $mot_de_passe);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $_SESSION['admin_id'] = $admin['id'];
        header('Location: tableau_de_bord.php');
        exit();
    } else {
        $erreur = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Administrateur</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 900px;
            width: 100%;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .logo {
            max-width: 250px; /* Taille initiale du logo */
            height: auto;
            margin-right: 30px; /* Espace entre le logo et le formulaire */
            transition: transform 0.5s ease; /* Animation du zoom */
        }
        .logo:hover {
            transform: scale(1.1); /* Zoom du logo au survol */
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .form-group label {
            text-align: left;
            display: block;
            font-weight: 600;
            color: #333;
        }
        .btn-primary {
            background-color: #1877f2;
            border-color: #1877f2;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #165eab;
            border-color: #165eab;
        }
        .alert-danger {
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <img src="../../assets/images/IMG.jpg" alt="Logo de la banque" class="logo">
        <div class="login-container">
            <h2>EQUITY Authentification</h2>
            <?php if (isset($erreur)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html>