<?php 
session_start();
include "../Classes/connexion.class.php"; 
require_once('../html_partials/header.php');

$pageConnexion = new connexion;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

<form action="connexion.php" method="POST">
    <input type="text" name="login" required>
    <input type="password" name="password" required>
    <input type="submit" name="connecter">
</form>

<?php

if(isset($_POST["connecter"])){
    $pageConnexion->connect();
}
?>



</body>
</html>