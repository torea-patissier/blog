<?php
require_once('html_partials/header.php');
require_once('classes/profil.class.php');
$user = new modprofil();
$user->profil();
var_dump($_SESSION['user']);
echo '<br/>';
var_dump($_SESSION['user']['id']);
?>

<form action="profil.php" method="POST">
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="password" placeholder="MDP">
    <input type="password" name="confpass" placeholder="CONF MDP">
    <input type="email" name="email" placeholder="EMAIL">
    <input type="submit" name="modifier">
</form>