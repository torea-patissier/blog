<?php
require_once('bdd.class.php');

class ModifArticle extends bdd
{

    // Fonction pour récupérer et afficher les articles/catégories à modifier en bdd
    public function ShowArtToModif()
    {
        // 2 requêtes identiques pour chercher en Bdd la catégorie ou article à modifier
        $get = $_GET['id'];
        $con = $this->connectDb();
        $stmt = $con->prepare("SELECT * FROM articles WHERE id = :get ");
        $stmt->bindValue('get', $get, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();

        // Boucle pour afficher l'article à modifier
        foreach ($result as $key) {
            $date = $key['date'];
            $article = $key['article'];
?>
            <form action="" method="POST">
                <label>Article</label><br /><br />
                <textarea type="text" name="article" rows="5" cols="33"><?php echo $article; ?></textarea><br />
                <label>Date de publication</label><br /><br />
                <input type="text" name="date" value="<?php echo $date; ?>"><br /><br />
                <input type="submit" name="modifier" value="Modifier">
            </form>

        <?php

            //Boucle pour afficher la catégorie à modifier

        }
    }

    // Fonction qui va modifier en Bdd l'artcile en question
    public function ModifArt()
    {
        if (isset($_POST['modifier']) and !empty($_POST['article'])) {
            $con = $this->connectDb();
            $article = htmlspecialchars($_POST['article']);
            $date = htmlspecialchars($_POST['date']);
            $getId = $_GET['id'];
            $modif = $con->prepare("UPDATE articles SET article = :article WHERE id = :getId ");
            $modif->bindValue('article', $article, PDO::PARAM_STR);
            $modif->bindValue('getId', $getId, PDO::PARAM_INT);
            $modif->execute();
            header('location:http://localhost/blog/Admin/admin.php');
        }
    }

}

?>