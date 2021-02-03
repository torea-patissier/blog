<?php
require_once('bdd.php');
class Article extends bdd
{
    function showUniqueArticle()
    {
        $con = $this->connectDb();
        $stmt = $con->prepare("SELECT * FROM articles WHERE id = '" . $_GET['id'] . "' ");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach($result as $key){
        $date = $key['date'];
         $article = $key['article'];
           echo '<br/>'.$date.'<br/>'.'<br/>';
          echo $article;
        }

    }

}
?>
