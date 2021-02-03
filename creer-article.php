<?php
session_start();
require_once('html_partials/header.php');
// Si l'user n'est pas un admin ou modérateur, on le redirige gentiment vers l'accueil
if($id_droits != 1337 && 42){
    header('location:http://localhost:8888/blog/index.php');
exit();
}
?>