<?php
require_once('classes/bdd.php');

class Delete extends bdd{

    public function DeleteArticle(){
        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $con = $this->connectDb();
            $sup_id = htmlspecialchars($_GET['id']);
            $supp = $con->prepare("DELETE FROM articles WHERE id = '" . $_GET['id'] . "' ");
            $supp2 = $con->prepare("DELETE FROM categories WHERE id = '" . $_GET['id'] . "' ");
            $supp3 = $con->prepare("DELETE FROM utilisateurs WHERE id = '" . $_GET['id'] . "' ");

            $supp->execute(array($sup_id));
            $supp2->execute(array($sup_id));
            $supp3->execute(array($sup_id));

            header('location:http://localhost:8888/blog/admin.php');
        
        }
        
    }
}

?>