<?php 

include "classes/inscription.class.php"; 
require_once('html_partials/header.php');

$INSCRIPTION = new inscription;
?>

<form action="inscription.php" method="POST">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="text" name="login" placeholder="Login" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="password" name="confpassword" placeholder="Conf. Mot de passe" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="submit" name="inscription">
</form>

<?php

if(isset($_POST["inscription"])){
    $INSCRIPTION->register();
}
?>



</body>
</html>

