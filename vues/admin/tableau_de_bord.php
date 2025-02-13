<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

include_once 'config.php';

// Requête pour obtenir le nombre total d'utilisateurs
$sql = "SELECT COUNT(*) AS total FROM comptes";
$result = $connexion->query($sql);
$row = $result->fetch_assoc();
$total_utilisateurs = $row['total'];


// Requête pour obtenir le nombre total d'utilisateurs
$sql1 = "SELECT COUNT(*) AS total_fichier FROM fichiers";
$result1 = $connexion->query($sql1);
$row1 = $result1->fetch_assoc();
$total_fichiers = $row1['total_fichier'];
?>
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Administrateur</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
        }
        .logo {
            max-width: 150px;
            height: auto;
        }
        .card {
            background-color: #17a2b8;
            color: white;
            text-align: center;
            border-radius: 10px;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
        }
        .card-text {
            font-size: 2rem;
            font-weight: bold;
            color: navy;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            margin-top: 20px;
        }
        .header-container {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .header-title {
            flex-grow: 1;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="header-container">
            <div class="mr-4">
                <!-- Logo de la banque aligné à gauche -->
                <img src="../../assets/images/IMG.jpg" alt="Logo de la banque" class="logo">
            </div>
       
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">Total des utilisateurs</h5>
                        <p class="card-text"><?= htmlspecialchars($total_utilisateurs) ?></p>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="text-center">
            <a href="liste_utilisateurs.php" class="btn btn-primary">Voir la liste des utilisateurs</a>
        </div>
    </div>
</body>
</html>
