<?php
require_once('bdd.php');
class Article extends bdd
{
  // Fonction pour afficher un article grace a GET ID
    function showUniqueArticle()
    {
        $con = $this->connectDb();
        $stmt = $con->prepare("SELECT * FROM articles WHERE id = '" . $_GET['id'] . "' ");
        $stmt->execute();
        $result = $stmt->fetchAll();
        //Boucle for qui récupère la date et l'article en Bdd
        foreach($result as $key){
        $date = $key['date'];
         $article = $key['article'];
           echo '<br/>'.$date.'<br/>'.'<br/>';
          echo $article;
        }

    }

}
?>
