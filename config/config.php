<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comptes_bancaires";

// Créer la connexion
$connexion = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué: " . $connexion->connect_error);
}
?>
