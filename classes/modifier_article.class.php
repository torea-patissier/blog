<?php
require_once('classes/bdd.php');

class ModifArticle extends bdd
{


    function ShowArtToModif()
    {
        $con = $this->connectDb();
        $stmt = $con->prepare("SELECT * FROM articles WHERE id = '" . $_GET['id'] . "' ");
        $stmt->execute();
        $result = $stmt->fetchAll();

        echo '<pre>';
        // var_dump($result);
        echo '</pre>';

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

        }
    }

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
    }
}

?>