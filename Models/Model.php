<?php

abstract class Model
{
    private static $_bdd;

    //Instancie la connexion à la bdd
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root', '');
        
        //On utilise les constantes de pdo pour gèrer les erreurs
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }


    //function de connexion par défaut a la bdd
    protected function getBdd()
    {
        if(self::$_bdd == null)
            self::setBdd();
        return self::$_bdd;
    }

    //Création de la méthod de
    //récupération d'éléments dans la bdd
    protected function getAll($table, $obj)
    {   
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM ' .$table. ' ORDER BY id desc');
        $req->execute();

        //on crée la variable data qui
        //va contenir les données 
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {   //Var contiendra les données sous forme d'objets
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}

?>