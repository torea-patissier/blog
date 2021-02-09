<?php
require_once('../Classes/bdd.class.php');

class Admin extends bdd{
    //Function pour l'admin
    public function AdminGestion()
    {
        $con = $this->connectDb();
        $stmt = $con->prepare('SELECT * FROM articles INNER JOIN categories ON  articles.id_categorie = categories.id ORDER BY categories.id');
        $stmt2 = $con->prepare('SELECT nom FROM categories');
        $stmt->execute();
        $stmt2->execute();
        $result = $stmt->fetchAll();
        $result2 = $stmt2->fetchAll();

        echo'<pre>';
        // var_dump($result2);
        echo'</pre>';

        foreach($result2 as $value){
            echo'<pre>';
            echo $value['nom'];
            echo'</pre>';
            foreach($result as $val){
                if($val['nom'] == $value['nom']){
                    echo $val['date'].'<br/>';
                    echo $val['article'].'<br/>'.'<br/>'.'<br/>';

                }
            }

        }

    }
}
?>