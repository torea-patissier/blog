<?php

require_once("bdd.class.php");

class Articles extends bdd
{

    function showArticles()
    {
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT * FROM categories INNER JOIN articles ON articles.id_categorie = categories.id ");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//Result devient un tableau des valeurs obtenues

            var_dump($result);
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
        }
        
    }

}

?>