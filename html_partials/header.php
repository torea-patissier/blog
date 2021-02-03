<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../blog/blog.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>BLOG</title>
</head>

<body>

    <?php
    // Cette variable m'aide à déterminer l'id_droits d'un utilisateur connecté et afficher la navbar 
    // en fonction de son id_droits
    if (!isset($_SESSION['user'])) {
        $id_droits = 0;
    } else {
        $id_droits = $_SESSION['user']['id_droits'];
    }

    //J'affiche ici la navbar d'un admin 
    if ($id_droits == 1337) {

        echo '
    <header>
    <nav class="navbar">
        <a class="navlink" href="../blog/index.php">Accueil</a>
        <a class="navlink" href="../blog/articles.php">Articles</a>
        <a class="navlink" href="../blog/article.php">Article</a>
        <a class="navlink" href="../blog/creer-article.php">Créer un article</a>
        <a class="navlink" href="../blog/profil.php">Profil</a>
        <a class="navlink" href="../blog/admin.php">Admin</a>
        <div class="dropdown-menu">
  <ul>
    <li><a href="#" >Item 1</a></li>
    <li><a href="#" >Item 2</a></li>
    <li><a href="#" >Last Item</a></li>
  </ul>
</div>
    </nav>
</header>';
    }
    //J'affiche ici la navbar d'un modérateur
    elseif ($id_droits == 42) {
        echo '
    <header>
    <nav class="navbar">
        <a class="navlink" href="../blog/index.php">Accueil</a>
        <a class="navlink" href="../blog/articles.php">Articles</a>
        <a class="navlink" href="../blog/article.php">Article</a>
        <a class="navlink" href="../blog/creer-article.php">Créer un article</a>
        <a class="navlink" href="../blog/profil.php">Profil</a>
        <form class="preservationform" action="profil.php" method="GET">
        <input class="deco" type="submit" name="deco" value="Se déconnecter">
    </nav>
</header>';
    } // J'affiche ici la navbar d'un utilisateur
    elseif ($id_droits == 1) {
        echo '
    <header>
    <nav class="navbar">
        <a class="navlink" href="../blog/index.php">Accueil</a>
        <a class="navlink" href="../blog/articles.php">Articles</a>
        <a class="navlink" href="../blog/article.php">Article</a>
        <a class="navlink" href="../blog/profil.php">Profil</a>
        <form class="preservationform" action="profil.php" method="GET">
        <input class="deco" type="submit" name="deco" value="Se déconnecter">
    </nav>
</header>';
    } else {
        //J'affiche ici la navbar d'une personne qui n'est pas connecté 
        echo '<header>
    <nav class="navbar">
        <a class="navlink" href="../blog/index.php">Accueil</a>
        <a class="navlink" href="../blog/articles.php">Articles</a>
        <a class="navlink" href="../blog/article.php">Article</a>
        <a class="navlink" href="../blog/inscription.php">Inscription</a>
        <a class="navlink" href="../blog/connexion.php">Connexion</a>
    </nav>
</header>';
    }
// Si j'appuie sur le bouton se déconnecter, je suis déco et rediriger vers l'accueil
    if (isset($_GET['deco'])) {
        session_destroy();
        header(('location:http://localhost:8888/blog/index.php'));
    }

    ?>