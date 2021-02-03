<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../blog/blog.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title><?php $titre ?></title>
</head>

<body>

    <?php
    session_start();
    // Cette variable m'aide à déterminer l'id_droits d'un utilisateur connecté et afficher la navbar 
    // en fonction de son id_droits
    $id_droits = $_SESSION['user']['id_droits'];
    //J'affiche ici la navbar d'un admin 
    if ($id_droits == 1337) {
        echo '
    <header>
    <nav class="navbar">
        <a class="navlink" href="../index.php">Accueil</a>
        <a class="navlink" href="../Articles/articles.php">Articles</a>
        <a class="navlink" href="../Article/article.php">Article</a>
        <a class="navlink" href="../Créer Article/creer-article.php">Créer un article</a>
        <a class="navlink" href="../Profil/profil.php">Profil</a>
        <a class="navlink" href="../Admin/admin.php">Admin</a>

    </nav>
</header>';
    }//J'affiche ici la navar d'un modérateur
    elseif($id_droits == 42) {
        echo '
    <header>
    <nav class="navbar">
        <a class="navlink" href="../index.php">Accueil</a>
        <a class="navlink" href="../Articles/articles.php">Articles</a>
        <a class="navlink" href="../Article/article.php">Article</a>
        <a class="navlink" href="../Créer Article/creer-article.php">Créer un article</a>
        <a class="navlink" href="../Profil/profil.php">Profil</a>

    </nav>
</header>';
    } // J'affiche ici la navbar qu'un utilisateur
    elseif (isset($_SESSION['id'])) {
        echo '
    <header>
    <nav class="navbar">
        <a class="navlink" href="../index.php">Accueil</a>
        <a class="navlink" href="../Articles/articles.php">Articles</a>
        <a class="navlink" href="../Article/article.php">Article</a>
        <a class="navlink" href="../Profil/profil.php">Profil</a>
    </nav>
</header>';
    } else {
        //J'affiche ici la navbar d'une personne qui n'est pas connecté 
        echo '<header>
    <nav class="navbar">
        <a class="navlink" href="../index.php">Accueil</a>
        <a class="navlink" href="../Articles/articles.php">Articles</a>
        <a class="navlink" href="../Article/article.php">Article</a>
        <a class="navlink" href="../Créer Article/creer-article.php">Créer un article</a>
        <a class="navlink" href="../Inscription/inscription.php">Inscription</a>
        <a class="navlink" href="../Connexion/connexion.php">Connexion</a>

    </nav>
</header>';
    }


    ?>
    <main>