<?php
require_once('bdd.class.php');

class Admin extends bdd
{
    //Fonction pour l'admin
    public function ShowArticles()
    {
        $con = $this->connectDb();
        $stmt = $con->prepare('SELECT * FROM articles INNER JOIN categories ON  articles.id_categorie = categories.id ORDER BY categories.id');
        $stmt2 = $con->prepare('SELECT nom FROM categories');
        $stmt->execute();
        $stmt2->execute();
        $result = $stmt->fetchAll();
        $result2 = $stmt2->fetchAll();
        // La première boucle permet d'afficher les catégories
        foreach ($result2 as $value) {

            echo '<br/><p class="categorie_admin">Catégorie : ' . ucfirst(strtolower($value['nom'])) . '</p><br/>' . '<br/>';
            foreach ($result as $val) {
                // La deuxième permet d'afficher les articles de la catégorie en question avec les infos 
                if ($val['nom'] == $value['nom']) {
                    echo $val['date'] . '<br/>';
                    echo $val['article'] . '<br/>';
                    $idget = $val[0];
                    // Ici on peut modifier ou supprimer l'article + redirection vers une autre page
                    echo '
                    <li class="li_admin">
                    <a class="href_admin" href="../Modifier_Article/modifier_article.php?id=' . $idget . '">Modifier |</a>
                    <a class="href_admin" href="../Supprimer/supprimer.php?id=' . $idget . '">Supprimer</a>
                    </li><br/><br/>';
                }
            }
        }
    }
    // Fonction pour ajouter une catégorie 
    public function AddCategorie()

    {
?>
        <!-- Formulaire d'ajout de catégorie -->
        <form action="" method="POST"><br /><br />
            <label><p class="add_categorie_admin">Ajouter une catégorie ici :</p></label><br /><br />
            <input class="zonetxt_admin"type="text" name="texte"><br /><br />
            <input class="button-admin" type="submit" name="ajouter" value="Ajouter">
        </form>
        <?php
        // Si on appuie sur le bouton ajouter
        if (isset($_POST['ajouter']) && !empty($_POST['texte'])) {
            $con = $this->connectDb();
            $nom = htmlspecialchars($_POST['texte']);

            $req = $con->prepare(" SELECT * FROM categories WHERE nom = ?");
            $req->execute([$nom]);
            $checkCategorie = $req->fetch();
            if ($checkCategorie) {
                // La catégorie déjà on revoit false et echo un message d'erreur
                echo '<br/> Catégorie déjà existante';
                return false;
            } else {
                // Sinon on ajoute la catégorie en Bdd
                $stmt = $con->prepare(" INSERT INTO categories (nom) VALUES (:nom) ");
                $stmt->bindValue('nom', $nom, PDO::PARAM_STR);
                $stmt->execute();
                header("Refresh: 0;url=admin.php");
            }
        }
    }
    // Fontcion pour afficher, modifier, supprimer une catégorie
    public function ShowSuppCategories()
    {
        $con = $this->connectDb();
        $stmt2 = $con->prepare('SELECT * FROM categories');
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();
        // Boucle pour afficher les catégories
        echo  '<br/>' . '<br/>' . '<h2 class="h2_admin">Catégories :</h2>' . '<br/>';
        foreach ($result2 as $value) {
            $idget = $value[0];

            echo '<br/><p class="categorie_admin">' . ucfirst(strtolower($value['nom'])) . '</p><br/>';
            // Ici on peut modifier ou supprimer la catégorie + redirection vers une autre page
            echo '
            
            <li>
            <a class="href_admin" href="../Modifier_Catégorie/modifier_categorie.php?id=' . $idget . '">Modifier |</a>
            <a class="href_admin" href="../Supprimer/supprimer.php?id=' . $idget . '">Supprimer</a>
            </li><br/><br/>';
        }
    }
    // Fonction pour gérer les utilisateurs en Bdd, droits, etc...
    public function ShowIdDroits()
    {
        $con = $this->connectDb();
        $stmt = $con->prepare('SELECT * FROM utilisateurs');
        $stmt->execute();
        $result = $stmt->fetchAll();

        echo '<table class="whole_table_admin">' . '<thead>';
        echo '<th class="table_admin"> ID </th>';
        echo '<th class="table_admin"> LOGIN </th>';
        echo '<th class="table_admin"> USERNAME </th>';
        echo '<th class="table_admin"> PASSWORD </th>';
        echo '<th class="table_admin"> E-MAIL </th>';
        echo '<th class="table_admin"> ID DROITS </th>';
        echo '<tbody>';
        foreach ($result as $value) {
        ?>
            <tr>
                <td class="table_admin" name="id"><?php echo $value[0]; ?></td>
                <td class="table_admin" name="login"><?php echo $value[1]; ?></td>
                <td class="table_admin" name="username"><?php echo $value[2]; ?></td>
                <td class="table_admin" name="mdp"><?php echo $value[3]; ?></td>
                <td class="table_admin" name="email"><?php echo $value[4]; ?></td>
                <td class="table_admin" name="id_droits"><?php echo $value[5]; ?></td>
                <td class="table_admin" name="id"><?php echo '<a class="href_admin" href="../Modifier_Utilisateur/modifier_utilisateur.php?id=' . $value[0] . '">' . 'Modifier' . '</a>'; ?></td>
                <td class="table_admin" name="id"><?php echo '<a class="href_admin" href="../Supprimer/supprimer.php?id=' . $value[0] . '">' . 'Supprimer' . '</a>'; ?></td>
            </tr>
<?php
        }
        echo '</tbody>' . '</table>';
    }
}

?>