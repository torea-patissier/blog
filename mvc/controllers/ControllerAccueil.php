<?php
//  Controllers Fait les requêtes avec les models et envoi les données aux views
// ControllerAccueil = class et sert à afficher la liste des articles sur accueil


class ControllerAccueil
{

    private  $_articleManager; // Permet d'exécuter les méthodes relatives aux articles
    private  $_view; // Pour générer la vue

    public function __construct($url)
    {// Si isset url et que l'url à PLUS + de 1 paramètre 
       if(isset($url) && count($url) > 1) {
           throw new \Exception("Page introuvable",1);// Message d'erreur
       }else{ // Sinon afficher la page
           $this->articles();
       }
    }

    private function articles(){
        $this->_articleManager = new ArticleManager (); // Obj de type ArticleManager
        $articles = $this->_articleManager->getArticles(); // Récupère les articles
        require_once('../views/viewAccueil.php');
    }


} 


?>