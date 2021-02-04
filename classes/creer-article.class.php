<?php

require_once("bdd.php");

class Article extends bdd
{
    function CreateArticle()
    {
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT * FROM articles");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll();//Result devient un tableau des valeurs obtenues
        $article = htmlspecialchars($_POST["newArticle"]);//
        $date = date("Y-m-d H:i:s");//
        $idUser = $_SESSION["user"]["id"];//Je récupère l'user id dans ma variable session
        //Je change la valeur de l'input catégories selon le choix afin de l'introduire en base de données
        if(isset($_POST["category"])){
            
            switch ($_POST["category"]){
                case "Rugby":
                    $_POST["category"] = "1";
                    break;
                case "Football":
                    $_POST["category"] = "3";
                    break;
                case "Golf":
                    $_POST["category"] = "4";
                        break;
                case "Autre":
                    $_POST["category"] = "99";
                        break;
            }
        }
        $catégorie = $_POST["category"];
        $stmt = $con->prepare("INSERT INTO articles (`article`, `id_utilisateur`, `id_categorie`, `date`) values ('$article', '$idUser', '$catégorie', '$date')");
        $stmt->execute();
    }
}

?>