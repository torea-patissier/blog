<?php

require_once("bdd.php");
class Articles extends bdd
{
    function showArticles()
    {
        $con = $this->connectDb(); // Connexion Db 
        $stmt = $con->prepare("SELECT * FROM categories  INNER JOIN articles ON articles.id_categorie = categories.id ");// Requete
        $stmt->execute();//J'éxécute la requete
        $result = $stmt->fetchAll();//Result devient un tableau des valeurs obtenues
        // var_dump($result);
        foreach($result as $key){
            // var_dump($key);
            $nom = $key['nom'];
            $date = $key['date'];
            $article = $key['article'];
            $id_article = $key['id'];
            echo'<br />';
            echo 'Catégorie : ' . $nom . '<br />'. '<br />';
            echo '<td> le: '.$date.'<br />';
            echo '<td>'.'<a href="article.php?id='.$id_article.'">' . $article .  '</a>' .'<br />'.'<br />';



        }
    }
}

?>





