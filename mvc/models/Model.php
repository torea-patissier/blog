<?php
// Class abstraite =càd qu'on ne peut pas l'instancier

abstract class Model
{
    private static $_bdd; //Attribut

    //Co à la Bdd
     private static function setBdd(){
         self::$_bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','root');
              //Constante de PDO pour gérer les erreurs
              self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
     }

     //Fonction  de connexion par défaut à la Bdd
     protected function getBdd(){
         if(self::$_bdd == null){
             self::setBdd();
             return self::$_bdd;
         }
     }

     //Création de la méthode de récup de la liste d'élément dans la Bdd
     protected function getAll($table, $obj){ // Prend le nom de la table et l'objet qu'on veut récupérer
         $this->getBdd(); // Connexion  à la Bdd
         $var = []; // Création d'un tableau vide
         $req = self::$_bdd->prepare("SELECT*FROM '".$table."'ORDER BY id desc");// Requête SQL
         $req->execute();
         

         // Créer une variable data qui contient les données 
         while($data = $req->fetch(PDO::FETCH_ASSOC)){
             $var[] = new $obj($data); // var contiendra les données sous forme d'objet
         }
         return $var;
         $req->closeCursor();
     }

} 


?>