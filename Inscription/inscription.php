<?php 

include "../Classes/inscription.class.php"; 

$INSCRIPTION = new inscription;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<form action="inscription.php" method="POST">
    <input type="text" name="login" required>
    <input type="password" name="password" required>
    <input type="password" name="confpassword" required>
    <input type="email" name="email" required>
    <input type="submit" name="inscription">
</form>

<?php

if(isset($_POST["inscription"])){
    $INSCRIPTION->register();
}
?>



</body>
</html>