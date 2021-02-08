<?php
require_once('classes/bdd.php');

class Delete extends bdd{

    public function DeleteArticle(){
        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $con = $this->connectDb();
            $sup_id = htmlspecialchars($_GET['id']);
            $supp = $con->prepare("DELETE FROM articles WHERE id = '" . $_GET['id'] . "' ");
            $supp->execute(array($sup_id));
            header('location:http://localhost:8888/blog/admin.php');
        
        }
        
    }
}


?>