<?php
require_once('bdd.php');

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

            echo '<br/> Catégorie : '.$value['nom'].'<br/>'.'<br/>';
            foreach($result as $val){
                if($val['nom'] == $value['nom']){
                    echo $val['date'].'<br/>';
                    echo $val['article'].'<br/>';
                    echo'
                    <form action = "" method="GET">
<input type="submit" name="modifier" value="Modifier">
<input type="submit" name="supprimer" value="Supprimer">
</form>'.'<br/>'.'<br/>'.'<br/>';

                }
            }

        }

        if(isset($_GET['modifier'])){
            echo'ok';
        }

         }
}
?>



