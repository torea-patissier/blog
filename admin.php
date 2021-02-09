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
<input type="submit" name="afficher" value="Afficher les articles">
<input type="submit" name="cacher" value="Cacher les articles">
<input type="submit" name="ajouter" value="Ajouter une catégorie">
</form> 

<?php
if(isset($_GET['afficher'])){
    $ADMIN->AdminGestion();
    if(isset($_GET['cacher'])){
        header('location:http://localhost:8888/blog/admin.php');
    }
}

if(isset($_GET['ajouter'])){
    ?>
            <form action="admin.php" method="POST"><br /><br />
            <label>Catégorie</label><br /><br />
            <input type="text" name="nom"><br /><br />
            <input type="submit" name="envoyer" value="Envoyer">
        </form>
    <?php
    $ADMIN->AddCategorie();
}
?>