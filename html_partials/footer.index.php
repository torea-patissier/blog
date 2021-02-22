
<footer>
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
    <ul class="list_footer">
        <li class="liens.footer"><a class="href_footer" href="index.php">Accueil</a></li>
        <li class="liens.footer"><a class="href_footer" href="Articles/articles.php?page=1">Articles</a></li>
        <li class="liens.footer"><a class="href_footer" href="Article/article.php">Article</a></li>
        <li class="liens.footer"><a class="href_footer" href="Créer Article/creer-article.php">Créer un article</a></li>
        <li class="liens.footer"><a class="href_footer" href="Profil/profil.php">Profil</a></li>
        <li class="liens.footer"><a class="href_footer" href="Admin/admin.php">Admin</a></li>
  </ul>
       
        <p>Copyright Projet BLOG pour LaPlateforme.io</p>';
    }
    //J'affiche ici la navbar d'un modérateur
    elseif ($id_droits == 42) {
        echo '
    <ul class="list_footer">
        <li class="liens.footer"><a class="href_footer" href="index.php">Accueil</a></li>
        <li class="liens.footer"><a class="href_footer" href="Articles/articles.php?page=1">Articles</a></li>
        <li class="liens.footer"><a class="href_footer" href="Article/article.php">Article</a></li>
        <li class="liens.footer"><a class="href_footer" href="Créer Article/creer-article.php">Créer un article</a></li>
        <li class="liens.footer"><a class="href_footer" href="Profil/profil.php">Profil</a></li>
    </ul>
        
        <p>Copyright Projet BLOG pour LaPlateforme.io</p>';
    } // J'affiche ici la navbar d'un utilisateur
    elseif ($id_droits == 1) {
        echo '
        <ul class="list_footer">
        <li class="liens.footer"><a class="href_footer" href="index.php">Accueil</a></li>
        <li class="liens.footer"><a class="href_footer" href="Articles/articles.php?page=1">Articles</a></li>
        <li class="liens.footer"><a class="href_footer" href="Article/article.php">Article</a></li>
        <li class="liens.footer"><a class="href_footer" href="Profil/profil.php">Profil</a></li>
        </ul>
        
        <p>Copyright Projet BLOG pour LaPlateforme.io</p>';
    } else {
        echo 
        '<ul class="list_footer">
        <li class="liens.footer"><a class="href_footer" href="index.php">Accueil</a></li>
        <li class="liens.footer"><a class="href_footer" href="Articles/articles.php?page=1">Articles</a></li>
        <li class="liens.footer"><a class="href_footer" href="Article/article.php">Article</a></li>
        <li class="liens.footer"><a class="href_footer" href="Inscription/inscription.php">Inscription</a></li>
        <li class="liens.footer"><a class="href_footer" href="Connexion/connexion.php">Connexion</a></li>
        </ul>
        
        <p>Copyright Projet BLOG pour LaPlateforme.io</p>'

        ;
    }
    ?>
</footer>
</body>
</html>