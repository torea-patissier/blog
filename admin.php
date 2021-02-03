<?php
    session_start();
require_once('html_partials/header.php');
echo'Admin';
// Si l'user n'est pas un admin, on le redirige gentiment vers l'accueil
if($id_droits != 1337){
    header('location:http://localhost:8888/blog/index.php');
exit();
}
?>  