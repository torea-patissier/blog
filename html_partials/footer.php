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
    <ul class="footer">
        <a class="navlink" href="../index.php">Accueil</a>
        <a class="navlink" href="../Articles/articles.php?page=1">Articles</a>
        <a class="navlink" href="../Article/article.php">Article</a>
        <a class="navlink" href="../Créer Article/creer-article.php">Créer un article</a>
        <a class="navlink" href="../Profil/profil.php">Profil</a>
        <a class="navlink" href="../Admin/admin.php">Admin</a>
  </ul>
        <div class="reseaux">
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
        </div>';
    }
    //J'affiche ici la navbar d'un modérateur
    elseif ($id_droits == 42) {
        echo '
    <ul class="footer">
        <a class="navlink" href="../index.php">Accueil</a>
        <a class="navlink" href="../Articles/articles.php?page=1">Articles</a>
        <a class="navlink" href="../Article/article.php">Article</a>
        <a class="navlink" href="../Créer Article/creer-article.php">Créer un article</a>
        <a class="navlink" href="../Profil/profil.php">Profil</a>
    </ul>
        <div class="reseaux">
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
        </div>';
    } // J'affiche ici la navbar d'un utilisateur
    elseif ($id_droits == 1) {
        echo '
        <ul class="footer">
        <a class="navlink" href="../index.php">Accueil</a>
        <a class="navlink" href="../Articles/articles.php?page=1">Articles</a>
        <a class="navlink" href="../Article/article.php">Article</a>
        <a class="navlink" href="../Profil/profil.php">Profil</a>
        </ul>
        <div class="reseaux">
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
        </div>';
    } else {
        echo 
        '<ul class="footer">
        <a class="navlink" href="../index.php">Accueil</a>
        <a class="navlink" href="../Articles/articles.php?page=1">Articles</a>
        <a class="navlink" href="../Article/article.php">Article</a>
        <a class="navlink" href="../Inscription/inscription.php">Inscription</a>
        <a class="navlink" href="../Connexion/connexion.php">Connexion</a>
        </ul>
        <div class="reseaux">
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
        </div>'
        ;
    }
    ?>
</footer>
</body>
</html>