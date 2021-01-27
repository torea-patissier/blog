<?php

class Router
{
    private $_ctrl; //Va nous permettre de déterminer le controlleur qu'on veut utiliser
    private $_view; //Gerer la view

    public function routeReq()
    {
        try
        {
            //Chargement automatique des classes du dossier models
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');

            });
            //on crée une variable $url 
            $url = '';

            //on va déterminer le controller en fonction de cette variable
            if(isset($_GET['url']))
            {   //On décompose l'url et on lui applique un filtre
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                
                //On récupère le premier paramètre de l'url
                //On le met tout en miniscules
                //On met sa première lettre en Majuscule
                $controller = ucfirst(strtolower($url[0])); //Ce sera = à Accueil
                
                $controllerClass = "Controller".$controller;
                //On retrouve le chemin du controller voulu
                $controllerFile = "Controllers/".$controllerClass.".php";

                //on check si le fichier du controller existe
                if(file_exists($controllerFile))
                {
                //on lance la classe en question
                //avec tous les parametres url
                //pour respecter l'encapsulation
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else{
                    throw new Exception('Page introuvable', 1);
            }
        }
                else{
                    require_once('Controllers/ControllerAccueil.php');
                    $this->_ctrl = new ControllerAccueil($url);
                }
          //Gestion des erreurs
        } catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            require_once('Views/viewError.php');
        }
    }
}

?>