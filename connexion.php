<?php
    session_start();
require_once('html_partials/header.php');
require_once('classes/connexion.class.php');
$connect = new connexion();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <main>

<form class="formulaire" action="connexion.php" method="POST">
            <h1>Connexion</h1><br />
            <label>Identifiants</label><br />
            <input class="text" type="text" name="login" required><br />
            <label>Mot de passe</label><br />
            <input class="password" type="password" name="password" required><br /><br />
            <input class="submit" type="submit" name="connecter" value="Se connecter"><br /><br />
        </form>
        <p class="preservationform">Vous n'avez pas de comtpe?</p><br />
        <form class = "preservationform" action="connexion.php" method="GET">
            <input class="submit" type="submit" name="inscription" value="S'inscrire">
        </form>

        </main>
</body>
<?php

    $connect->connect();

if(isset($_GET['inscription'])){
    header('location:http://localhost:8888/blog/inscription.php');
}

?>
</html>