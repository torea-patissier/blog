<?php
    session_start();
require_once('../html_partials/header.php');
// Si l'user n'est pas un admin, on le redirige gentiment vers l'accueil
if($id_droits != 1337 && $id_droits != 42){
    header('location:http://localhost/blog/index.php');
exit();
}
require_once('../Classes/admin.class.php');

$ADMIN = new Admin();
// $ADMIN->AdminGestion();
$ADMIN->AdminGestion();

?>  