<?php
// Router gère les requêtes de l'url et sait quel controller appeler pour résoudre la requête

class Router
{
    private $ctrl; // pour déterminer le controller qu'on veut
    private $view; // pour déterminer la vue qu'on veut

    //fonction pour gérer les  req users
    public function routeReq(){

        //CHARGEMENT AUTOMATIQUE DES CLASSES DU DOSSIER MODELS

        try{//Execute le code
            spl_autoload_register(function($class){// Instancier les classes 
                require_once('../models/'.$class.'.php');// Va appeler automatiquement les fichiers présent dans le dossier  models
            });
            
            $url='';//On crée un var $url

            
            if(isset($_GET['url'])){//On va déterminer le controller en fonction de la valeur de cette variable
               
                $url = explode('/',filter_var($_GET['url'],FILTER_SANITIZE_URL)); //On décompose l'URL et on lui applique un filtre

                $controller = ucfirst(strtolower($url[0])); // Récup le premier paramètre de url, met la 1ère lettre en Maj et le reste en Min
                $controllerClass = "Controller".$controller;

                $controllerFile = "controllers/".$controllerClass.".php";   // On retrouve le chemin du controller voulu


                if(file_exists($controllerFile)){  //On check si le fichier existe
                    require_once($controllerFile);// On lance la classe en question avec tous les paramètres url en respectant l'encapsulation
                    $this->ctrl = new $controllerClass($url);
                }else{
                    throw new \Exception("Page introuvable",1);
                }
            }else{
                require_once('controllers/ControllerAccueil.php');
                $this->ctrl = new ControllerAccueil($url);
            }

        }catch(\Exception$e){// Affiche les erreurs de try
            $errorMsg = $e->getMessage();// Obtient les msg d'erreur
            require_once('views/viewError.php');// Récupère la vue de façon NON sécurisé du msg d'erreur 
        }
    }
}


?>