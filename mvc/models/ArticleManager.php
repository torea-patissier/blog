<?php
//Models communique avec la Bdd, opération de créatin, ajout, modification, suppression des articles, commentaires, utilisateurs
//ArticleManager va contenir les méthodes pour création ,affichage, modifications de l'articles 

class ArticleManager extends Model // Article devient enfant de Model et hérite de ses méthodes
{
    //Créer la fonction qui va récupérer tous les articles dans la Bdd 
    public function getArticles(){
        return $this->getAll('articles','Article');
    }
}
?>