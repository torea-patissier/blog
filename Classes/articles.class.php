<?php

require_once("bdd.class.php");

class Articles extends bdd
{
    public $request;
    public $categorie;



    function showArticles()
    {   
        if(isset($_GET["filterArticle"]) && !empty($_GET["filterArticle"])){
            $id = $_GET["filterArticle"];
            $con = $this->connectDb(); // Connexion Db 
            $request = "SELECT * FROM articles WHERE id_categorie = '$id' ";
            $stmt = $con->prepare($request);// Requete
            $stmt->execute();//J'éxécute la requete
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

            var_dump($result);
                foreach($result as $key){
                    $date = $key['date'];
                    $article = $key['article'];
                    $id_article = $key['id'];
                    
                    echo "<tr>";
                    echo "<td class='Date'>" . $date . "</td>" . "<br />" ;
                    echo "<td class='Article'>" . '<a href="../Article/article.php?id='.$id_article.'">' . $article . '</a>' . "</td>" . "<br />" .  "<br />";
                    echo "</tr>";
                    $this->request = $request;
                }
            }else{
        
            $con = $this->connectDb(); // Connexion Db 
            $request = "SELECT * FROM categories INNER JOIN articles ON articles.id_categorie = categories.id ";
            $stmt = $con->prepare($request);// Requete
            $stmt->execute();//J'éxécute la requete
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

            foreach($result as $key){
                $nom = $key['nom'];
                $date = $key['date'];
                $article = $key['article'];
                $id_article = $key['id'];
                
                echo "<tr>";
                echo "<td class='Titre'>" . $nom . "</td>" . "<br />" ;
                echo "<td class='Date'>" . $date . "</td>" . "<br />" ;
                echo "<td class='Article'>" . '<a href="../Article/article.php?id='.$id_article.'">' . $article . '</a>' . "</td>" . "<br />" .  "<br />";
                echo "</tr>";
                $this->request = $request;
            }
        }
    }
        
    

    function filterCategory()
    {
        $request = $this->request;
        $categorie = $this->categorie;
        $con = $this->connectDb(); // Connexion Db 
        $req = "SELECT nom FROM categories";
        $stmt = $con->prepare($req);// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues
        
        if(isset($_POST["Valider"])){
            foreach($result as $resultat){
            $categorie = $resultat["nom"];
                switch ($request){
                
                    case "Filtre Articles":
                        $request = "SELECT * FROM categories INNER JOIN articles ON articles.id_categorie = categories.id";
                        $this->request = $request;
                        break;

                    case "$categorie":
                        $request = "SELECT * FROM categories WHERE nom = '$categorie' INNER JOIN articles ON articles.id_categorie = categories.id";
                        $this->request = $request;
                        break;
                    
                }
            }
            
        }
    }

    function filterForm()
    {
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT * FROM categories");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

        echo "<option value='0'>Filtrer Catégories</option>";
        foreach($result as $resultat){
            $filter = $resultat["nom"];
            $idFilter = $resultat["id"];

            echo "<option value='$idFilter'>$filter</option>";
        
        }
        $this->categorie = $resultat["nom"];
    }
}

?>