<?php 

require_once("bdd.class.php");



class Index extends bdd{

    function showLastArticles()
    {
        //Requete numero 1
        $con = $this->connectDb();
        $stmt = $con->prepare('SELECT * FROM articles ORDER BY date DESC LIMIT 3');
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        foreach($result as $resultat){
            $id_article = $resultat['id'];
            
            echo '<div class="articleIndex"><a href="Article/article.php?id='.$id_article.'">' . $resultat['article'] . '<a/></div>' . "<br />";
        }
    }
}