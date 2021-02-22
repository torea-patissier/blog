<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/wholeWebSite.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>BLOG</title>
</head>

<body>

    <?php
    require_once('../Classes/articles.class.php');
    $categorie = new Articles;
    // Cette variable m'aide à déterminer l'id_droits d'un utilisateur connecté et afficher la navbar 
    // en fonction de son id_droits
    if (!isset($_SESSION['user'])) {
        $id_droits = 0;
    } else {
        $id_droits = $_SESSION['user']['id_droits'];
    }

    //J'affiche ici la navbar d'un admin 
    if ($id_droits == 1337) {
        ?>
        <header>
        <nav class="navbar">
            <a class="navlink" href="../index.php">Accueil</a>
            <a class="navlink" href="../Articles/articles.php?page=1">Articles</a>
            <a class="navlink" href="../Créer Article/creer-article.php">Créer un article</a>
            <a class="navlink" href="../Profil/profil.php">Profil</a>
            <a class="navlink" href="../Admin/admin.php">Admin</a>
            <div id="menu">
            <ul>
                <li>
                    <a class="navlink" href='#'>Catégories</a>
                    <ul>
                        <?=$categorie->CategoryPaginationIndex();?>
                    </ul>
                </li>
            </ul>
        </div>
        </nav>
    </header>
    <?php
    }
    //J'affiche ici la navbar d'un modérateur
    elseif ($id_droits == 42) {
        ?>
        <header>
        <nav class="navbar">
            <a class="navlink" href="../index.php">Accueil</a>
            <a class="navlink" href="../Articles/articles.php?page=1">Articles</a>
            <a class="navlink" href="../Créer Article/creer-article.php">Créer un article</a>
            <a class="navlink" href="../Profil/profil.php">Profil</a>
    
            <div id="menu">
            <ul>
                <li>
                    <a class="navlink" href='#'>Catégories</a>
                    <ul>
                        <?=$categorie->CategoryPaginationIndex();?>
                    </ul>
                </li>
            </ul>
        </div>
        </nav>
    </header>
    <?php
    } // J'affiche ici la navbar d'un utilisateur
    elseif ($id_droits == 1) {
        ?>
        <header>
        <nav class="navbar">
            <a class="navlink" href="../index.php">Accueil</a>
            <a class="navlink" href="../Articles/articles.php?page=1">Articles</a>
            <a class="navlink" href="../Profil/profil.php">Profil</a>
    
            <div id="menu">
            <ul>
                <li>
                    <a class="navlink" href='#'>Catégories</a>
                    <ul>
                        <?=$categorie->CategoryPaginationIndex();?>
                    </ul>
                </li>
            </ul>
        </div>
        </nav>
    </header>
    <?php
    } else {
        //J'affiche ici la navbar d'une personne qui n'est pas connecté 
        ?>
    <header>
    <nav class="navbar">
        <a class="navlink" href="../index.php">Accueil</a>
        <a class="navlink" href="../Articles/articles.php?page=1">Articles</a>
        <a class="navlink" href="../Inscription/inscription.php">Inscription</a>
        <a class="navlink" href="../Connexion/connexion.php">Connexion</a>

        <div id="menu">
        <ul>
            <li>
                <a class="navlink" href='#'>Catégories</a>
                <ul>
                    <?=$categorie->CategoryPaginationIndex();?>
                </ul>
            </li>
        </ul>
    </div>
    </nav>
</header>
<?php
    }
// Si j'appuie sur le bouton se déconnecter, je suis déco et rediriger vers l'accueil
    if (isset($_GET['deco'])) {
        session_destroy();
        header(('location:http://localhost/blog/index.php'));
    }
    ?>