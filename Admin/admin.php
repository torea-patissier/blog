<?php
session_start();

require_once('html_partials/header.php');

require_once('../Classes/admin.class.php');

// Si l'user n'est pas un admin, on le redirige gentiment vers l'accueil

if ($id_droits != 1337) {
    header('location:http://localhost:8888/blog/index.php');
    exit();
}

$ADMIN = new Admin();

?>

<form action="" method="POST">
    <input type="submit" name="cacher" value="Retour">
    <input type="submit" name="afficher" value="Afficher les articles">
    <input type="submit" name="ajouter" value="Gérer les catégories">
    <input type="submit" name="user" value="Gérer les utilisateurs">
</form>

<?php
if (isset($_POST['afficher'])) {
    $ADMIN->ShowArticles();
}
if (isset($_POST['cacher'])) {
    header('location:http://localhost:8888/blog/admin.php');
}
if (isset($_POST['ajouter'])) {
    $ADMIN->ShowSuppCategories();
    $ADMIN->AddCategorie();
}
if (isset($_POST['user'])) {
    $ADMIN->ShowIdDroits();
}

?>