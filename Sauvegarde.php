<?
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