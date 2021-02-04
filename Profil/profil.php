<?php 
    session_start();
    include ("../classes/profil.class.php");
    require_once('../html_partials/header.php');
    $user = new modprofil();
    $user -> profil();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>  
    <form action="profil.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="confpass" placeholder="Confimation mdp">
        <input type="email" name="email" placeholder="E-mail">
        <input type="submit" name="modifier">
    </form>

</body>
</html>
