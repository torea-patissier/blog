<?php

require_once("bdd.class.php");

class LastArticle extends bdd
{   

    public $idArticle;

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
        $stmt = $con->prepare("SELECT * FROM articles WHERE id = :get");// Requete
        $stmt->bindValue('get', $get, PDO::PARAM_STR);
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues
        
        foreach($result as $resultat){
        $article = $resultat['article'];
        $dateArticle = $resultat['date'];
        $idUser = $resultat['id_utilisateur'];
        $idArticle = $resultat['id'];
        }
        //UNE NOUVELLE REQUETE POUR RECUPERER LES INFORMATIONS SUR L'UTILISATEUR QUI A POSTé L'ARTICLE
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT id, username FROM utilisateurs WHERE id = :idUser");// Requete
        $stmt->bindValue('idUser', $idUser, PDO::PARAM_INT);
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

        foreach($result as $resultat){
        $userNameId = $resultat['id'];
        $userName = $resultat['username'];
        }
        echo "Posté le : " . $dateArticle . "<br />";
        echo "Par : " . $userName . "<br /><br />";
        echo $article . "<br /><br />";

        $this->idArticle = $idArticle;
        $_SESSION["articleInfo"] = $get;
    }

    function showComments()
    {
        $get = $_GET["id"];
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT * FROM commentaires WHERE id_article = :get ORDER BY date DESC");// Requete
        $stmt->bindValue('get', $get, PDO::PARAM_INT);
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues 

 
        foreach($result as $key){

            $commentaire = $key['commentaire'];
            $dateCommentaire = $key['date'];
            $commentUser = $key['id_utilisateur'];
         
           
            $stmt = $con->prepare("SELECT * FROM utilisateurs WHERE id = :commentUser");// Requete
            $stmt->bindValue('commentUser', $commentUser, PDO::PARAM_INT);
            $stmt->execute();//J'éxécute la requete
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues 
            
            foreach($result as $resultat){
                $username = $resultat["username"];
            }

            
            echo "Posté le : " . $dateCommentaire . "<br />" . "Par : " . $username . "<br />" . $commentaire . "<br /><br />";
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

    function publierCommentaire()
    {   
        $commentaire = addslashes(htmlspecialchars($_POST["CommentSection"]));
        $idArticle = $this->idArticle;
        $date = date("Y-m-d H:i:s");
        $userId = $_SESSION["user"]["id"];
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("INSERT INTO commentaires (commentaire, id_article, id_utilisateur, date) VALUES (:commentaire, :idArticle, :userId, '$date')");// Requete
        $stmt->bindValue('commentaire', $commentaire, PDO::PARAM_STR);
        $stmt->bindValue('idArticle', $idArticle, PDO::PARAM_INT);
        $stmt->bindValue('userId', $userId, PDO::PARAM_INT);
        $stmt->execute();//J'éxécute la requete
        
    }
}

?>