<?php
require_once('bdd.class.php');

class ModifCat extends bdd
// Fonction pour 
{
    function ShowCategorieToModif()
    {
        $getId = $_GET['id'];
        $con = $this->connectDb();
        $stmt2 = $con->prepare("SELECT * FROM categories WHERE id = :getId ");
        $stmt2->bindValue('getId', $getId, PDO::PARAM_INT);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();

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

    // Fonction qui va modifier en Bdd la catégorie en question

    function ModifCategorie()
    {
        if (isset($_POST['modifier']) and !empty($_POST['categorie'])) {
            $con = $this->connectDb();
            $categorie = htmlspecialchars($_POST['categorie']);
            $getId = $_GET['id'];
            $modif = $con->prepare("UPDATE categories SET nom = :categorie WHERE id = :getId ");
            $modif->bindValue('categorie', $categorie, PDO::PARAM_STR);
            $modif->bindValue('getId', $getId, PDO::PARAM_INT);
            $modif->execute();
            header('location:http://localhost/blog/Admin/admin.php');
        }
    }
}

?>