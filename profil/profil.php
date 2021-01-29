<?php 
    include ("../classes/profil.class.php");
    session_start();
    $user = new modprofil();
    $user -> profil();
    var_dump($_SESSION['id']);

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
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="MDP">
        <input type="password" name="confpass" placeholder="CONF MDP">
        <input type="email" name="email" placeholder="EMAIL">
        <input type="submit" name="modifier">
    </form>

</body>
</html>