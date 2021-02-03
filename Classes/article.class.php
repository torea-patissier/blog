<?php

require_once("bdd.class.php");

class LastArticle extends bdd
{
    function showSelectedArticle()
    {   
        $get = $_GET["id"];
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT * FROM articles where id = '$get' ");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

            var_dump($result);
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

        }
        
    }

    function getUsername()
    {
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT id, username FROM utilisateurs");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues 
        
        return $result;
    }
}

?>