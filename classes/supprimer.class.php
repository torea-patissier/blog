<?php
require_once('bdd.class.php');

class Delete extends bdd{

    public function DeleteArticle(){
        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $con = $this->connectDb();
            $sup_id = $_GET['id'];
            $supp = $con->prepare("DELETE FROM articles WHERE id = :supId ");
            $supp->bindValue('supId', $sup_id, PDO::PARAM_INT);
            $supp2 = $con->prepare("DELETE FROM categories WHERE id = :supId ");
            $supp2->bindValue('supId', $sup_id, PDO::PARAM_INT);
            $supp3 = $con->prepare("DELETE FROM utilisateurs WHERE id = :supId ");
            $supp3->bindValue('supId', $sup_id, PDO::PARAM_INT);

            $supp->execute();
            $supp2->execute();
            $supp3->execute();

            header('location:http://localhost/blog/Admin/admin.php');
        
        }
        
    }
}

?>