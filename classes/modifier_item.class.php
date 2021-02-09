<?php
require_once('classes/bdd.php');

class ModifArticle extends bdd
{

// Fonction pour récupérer et afficher les articles/catégories à modifier en bdd
    function ShowArtToModif()
    {
        // 2 requêtes identiques pour chercher en Bdd la catégorie ou article à modifier
        $con = $this->connectDb();
        $stmt = $con->prepare("SELECT * FROM articles WHERE id = '" . $_GET['id'] . "' ");
        $stmt2 = $con->prepare("SELECT * FROM categories WHERE id = '" . $_GET['id'] . "' ");

        $stmt->execute();
        $stmt2->execute();

        $result = $stmt->fetchAll();
        $result2 = $stmt2->fetchAll();

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
        foreach ($result2 as $key) {
            $categorie = $key['nom'];
?>
            <form action="" method="POST">
                <label>Catégorie</label><br /><br />
                <input type="text" name="categorie" rows="5" cols="33" value="<?php echo $categorie; ?>"><br /><br />
                <input type="submit" name="modifier" value="Modifier">
            </form>

<?php
    }

}

// Fonction qui va modifier en Bdd l'artcile/catégorie en question
    function ModifArt()
    {
        if (isset($_POST['modifier']) and !empty($_POST['article'])) {
            $con = $this->connectDb();
            $article = htmlspecialchars($_POST['article']);
            $date = htmlspecialchars($_POST['date']);
            $getId = $_GET['id'];
            $modif = $con->prepare("UPDATE articles SET article = '".$article."' WHERE id = '".$getId."' ");
            $modif->execute();
            header('location:http://localhost:8888/blog/admin.php');
        }
        if (isset($_POST['modifier']) and !empty($_POST['categorie'])) {
            $con = $this->connectDb();
            $categorie = htmlspecialchars($_POST['categorie']);
            $getId = $_GET['id'];
            $modif = $con->prepare("UPDATE categories SET nom = '".$categorie."' WHERE id = '".$getId."' ");
            $modif->execute();
            header('location:http://localhost:8888/blog/admin.php');
        }
    }
}

?>