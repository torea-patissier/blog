<?php
class ArticleManager extends Model
{
    //créer la function qui va récupèrer
    //tous les articles dans la bdd
    public function getArticles()
    {
        return $this->getAll('articles', 'Article');

    }
}

?>