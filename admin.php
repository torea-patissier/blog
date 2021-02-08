<?php
    session_start();

require_once('html_partials/header.php');

require_once('classes/admin.class.php');

// Si l'user n'est pas un admin, on le redirige gentiment vers l'accueil

if($id_droits != 1337 && $id_droits != 42){
    header('location:http://localhost:8888/blog/index.php');
exit();
}

$ADMIN = new Admin();

// $ADMIN->AdminGestion();



?> 

<form action="admin.php" method="GET">
<input type="submit" name="afficher" value="Afficher les catégories">
</form> 

<?php
if(isset($_GET['afficher'])){
    $ADMIN->AdminGestion();
}
?>