<?php
session_start();

require_once('html_partials/header.php');
require_once('classes/profil.class.php');
$user = new modprofil();
$user->profil();
var_dump($_SESSION['user']);
?>

<form action="profil.php" method="POST">
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="password" placeholder="MDP">
    <input type="password" name="confpass" placeholder="CONF MDP">
    <input type="email" name="email" placeholder="EMAIL">
    <input type="submit" name="modifier">
</form>
<form class="preservationform" action="profil.php" method="GET">
    <input class="submit" type="submit" name="deco" value="Se déconnecter">
</form>
<?php
if (isset($_GET['deco'])) {
    session_destroy();
    header(('location:http://localhost:8888/blog/index.php'));
}
?>