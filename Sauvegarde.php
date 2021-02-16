<?php
function getUsersInfo()
    {
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT id, username FROM utilisateurs ");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

        $_SESSION["usersInfo"] = $result;
    }

    function showSelectedArticle()
    {   
        //ON FAIT LA REQUETE POUR PRENDRE TOUTES LES INFORMATIONS DE L'ARTICLE SELECTIONNé AU PREALABLE
        $get = $_GET["id"];
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT * FROM articles WHERE id = '$get'");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues
        
        $article = $result[0]['article'];
        $dateArticle = $result[0]['date'];
        $idUser = $result[0]['id_utilisateur'];
        $idArticle = $result[0]['id'];

        //UNE NOUVELLE REQUETE POUR RECUPERER LES INFORMATIONS SUR L'UTILISATEUR QUI A POSTé L'ARTICLE
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT id, username FROM utilisateurs WHERE id = '$idUser'");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

        $userNameId = $result[0]['id'];
        $userName = $result[0]['username'];

        echo "Posté le : " . $dateArticle . "<br />";
        echo "Par : " . $userName . "<br /><br />";
        echo $article;


    }

    function showComments()
    {
        $get = $_GET["id"];
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT * FROM commentaires WHERE id_article = '$get' ");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues 
        
        foreach($result as $key){

            $commentaire = $key['commentaire'];
            $dateCommentaire = $key['date'];
            echo "$dateCommentaire" . "<br />" . "$commentaire";

        }
        
    }

    function getArticleUser()
    {
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT id, username FROM utilisateurs");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues 
        
        $_SESSION['usersInfo'] = $result;
    }



    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search = $_GET['search'];
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT * FROM categorie WHERE nom = '$search' ");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

        foreach($result as $resultat){
            $categorieArticle = $resultat['nom'];
            $categorieId = $resultat['id'];
            echo "$categorieArticle" . "<br /><br />";
        
            $con = $this->connectDb(); // Connexion Db 
            $stmt = $con->prepare("SELECT * FROM articles WHERE id_categorie = '$categorieId' ");// Requete
            $stmt->execute();//J'éxécute la requete
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues
            
            foreach($result as $resultat){
                $article = $resultat['article'];
                $date = $resultat['date'];
                $idCategorie = $resultat['id_categorie'];
                $idUtilisateur = $resultat['id_utilisateur'];

                $con = $this->connectDb(); // Connexion Db 
                $stmt = $con->prepare("SELECT username FROM utilisateur WHERE id = $idUtilisateur ");// Requete
                $stmt->execute();//J'éxécute la requete
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues
                
                foreach($result as $resultat){
                    $userName = $resultat['username'];
                }
            
                echo "$userName";
                echo "$date";
                echo "$article";
            }
        }
    }        





    <!-- <h1>Liste des articles</h1>
                <!-- <?= $ARTICLES->showArticles();?> -->
                    
                    <form action="" method="GET">
                        <select name="filterArticle">
                            <?=$ARTICLES->filterForm();?>
                        </select>
                        <input type="submit" name="Valider" value="Filtrer">
                    </form>

                    </tbody>
                </table> -->





                --------------------------------------------------------

                // On détermine le nombre total d'articles
 $sql = "SELECT * FROM articles ORDER BY date DESC LIMIT '.$depart.','.$articlesParPage);

 // On prépare la requête
 $query = $articles->connectDb()->prepare($sql);

 // On exécute
 $query->execute();

 // On récupère le nombre d'articles
 $result = $query->fetch();

 $nbArticles = (int) $result['nb_articles'];

 // On détermine le nombre d'articles par page
 $parPage = 5;

 // On calcule le nombre de pages total
 $pages = ceil($nbArticles / $parPage);

 // Calcul du 1er article de la page
 $premier = ($currentPage * $parPage) - $parPage;

 $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC LIMIT :premier, :parpage;';

 // On prépare la requête
 $query = $articles->connectDb()->prepare($sql);

 $query->bindValue(':premier', $premier, PDO::PARAM_INT);
 $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

 // On exécute
 $query->execute();

 // On récupère les valeurs dans un tableau associatif
 $article = $query->fetchAll(PDO::FETCH_ASSOC);











 function showArticles($article)
    {   
        if(isset($_GET["filterArticle"]) && !empty($_GET["filterArticle"])){
            $id = $_GET["filterArticle"];
            $con = $this->connectDb(); // Connexion Db 
            $request = "SELECT * FROM articles WHERE id_categorie = '$id' ORDER BY date DESC LIMIT 0, 5 ";
            $stmt = $con->prepare($request);// Requete
            $stmt->execute();//J'éxécute la requete
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

                foreach($result as $key){
                    $date = $key['date'];
                    $articleDb = $key['article'];
                    $id_article = $key['id'];
                    echo "<table class='table'>
                    <thead>
                        <th>Date</th>
                        <th>Article</th>
                    </thead> <tbody>";
                    echo "<tr>";
                    echo "<td class='Date'>" . $date . "</td>" . "<br />" ;
                    echo "<td class='Article'>" . '<a href="../Article/article.php?id='.$id_article.'">' . $articleDb . '</a>' . "</td>" . "<br />" .  "<br />";
                    echo "</tr>";
                    $this->request = $request;
                }
            }else{
        
            $con = $this->connectDb(); // Connexion Db 
            $request = "SELECT * FROM categories INNER JOIN articles ON articles.id_categorie = categories.id ORDER BY date DESC LIMIT 0, 5";
            $stmt = $con->prepare($request);// Requete
            $stmt->execute();//J'éxécute la requete
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

            foreach($result as $key){
                $nom = $key['nom'];
                $date = $key['date'];
                $articleDb = $key['article'];
                $id_article = $key['id'];
                echo "<table class='table'>
                <thead>
                    <th>Catégorie</th>
                    <th>Date</th>
                    <th>Article</th>
                </thead><tbody>";
                echo "<tr>";
                echo "<td class='Titre'>" . $nom . "</td>" . "<br />" ;
                echo "<td class='Date'>" . $date . "</td>" . "<br />" ;
                echo "<td class='Article'>" . '<a href="../Article/article.php?id='.$id_article.'">' . $articleDb . '</a>' . "</td>" . "<br />" .  "<br />";
                echo "</tr>";
                $this->request = $request;
            }
        }
    }









<?php
    $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC LIMIT :premier, :parpage;';

    // On prépare la requête
    $query = $articles->connectDb()->prepare($sql);
   
    $query->bindValue(':premier', $premier, PDO::PARAM_INT);
    $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
   
    // On exécute
    $query->execute();
   
    // On récupère les valeurs dans un tableau associatif
    $article = $query->fetchAll(PDO::FETCH_ASSOC);


    function articlesTry()
    {
        // On détermine sur quelle page on se trouve
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }

        // On se connecte à là base de données
        require_once('../Classes/bdd.class.php');

        $con = $this->connectDb(); // Connexion Db 
        // On détermine le nombre total d'articles
        $sql = 'SELECT COUNT(*) AS nb_articles FROM `articles`;';

        // On prépare la requête
        $query = $con->prepare($sql);

        // On exécute
        $query->execute();

        // On récupère le nombre d'articles
        $result = $query->fetch();

        $nbArticles = (int) $result['nb_articles'];

        // On détermine le nombre d'articles par page
        $parPage = 5;

        // On calcule le nombre de pages total
        $pages = ceil($nbArticles / $parPage);

        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;

        $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC LIMIT :premier, :parpage;';

        // On prépare la requête
        $query = $con->prepare($sql);

        $query->bindValue(':premier', $premier, PDO::PARAM_INT);
        $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

        // On exécute
        $query->execute();

        // On récupère les valeurs dans un tableau associatif
        $article = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($article as $resultat){
            echo "<tr>";
            echo "<td>".$resultat['id_categorie'] . "</td><br />";
            echo "<td>".$resultat['article'] . "</td><br />";
            echo "<td>".$resultat['date'] . "</td><br />";
            echo "</tr>";
        }
    }