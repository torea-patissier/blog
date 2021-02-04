<?php
require_once('bdd.php');

class Admin extends bdd{
    //Function pour l'admin
    public function AdminGestion()
    {
        $con = $this->connectDb();
        $stmt = $con->prepare('SELECT * FROM articles INNER JOIN categories ON articles.id_categorie = categories.id ORDER BY categories.id');
        $stmt2 = $con->prepare('SELECT nom FROM categories');
        $stmt->execute();
        $stmt2->execute();
        $result = $stmt->fetchAll();
        $result2 = $stmt2->fetchAll();
        foreach($result2 as $value){
            echo $value['nom'].'<br/>'.'<br/>'.'<br/>'.'<br/>';
            foreach($result as $value){
                echo '<br />';
                echo $value['date'];
                echo '<br />';
                echo $value['article'];
                echo '<br />'.'<br />';
        
            }
        }

}