<?php
session_start();

require_once('../html_partials/header.php');

require_once('../Classes/admin.class.php');

// Si l'user n'est pas un admin, on le redirige gentiment vers l'accueil

if ($id_droits != 1337) {
    header('location:http://localhost/blog/Index/index.php');
    exit();
}

$pageAdmin = new Admin();

?>
<main class="main_admin">
    <section class="formulaire_admin">
    <h2 class="h2_admin">Gestion Admin</h2>
<form action="" method="POST">
    <input class="button-admin" type="submit" name="cacher" value="Retour">
    <input class="button-admin2" type="submit" name="afficher" value="Afficher les articles">
    <input class="button-admin2" type="submit" name="ajouter" value="Gérer les catégories">
    <input class="button-admin2" type="submit" name="user" value="Gérer les utilisateurs">
</form>
</section>
<?php
if (isset($_POST['afficher'])) {
    $pageAdmin->ShowArticles();
}
if (isset($_POST['cacher'])) {
    header('location:http://localhost/blog/Admin/admin.php');
}
if (isset($_POST['ajouter'])) {
    $pageAdmin->ShowSuppCategories();
    $pageAdmin->AddCategorie();
}
if (isset($_POST['user'])) {
    $pageAdmin->ShowIdDroits();
}

?>
</main>
