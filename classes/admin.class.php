<?php
require_once('bdd.php');

class Admin extends bdd
{
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

        echo '<pre>';
        // var_dump($result);
        echo '</pre>';

        foreach ($result2 as $value) {

            echo '<br/> Catégorie : ' . $value['nom'] . '<br/>' . '<br/>';
            foreach ($result as $val) {
                if ($val['nom'] == $value['nom']) {
                    echo $val['date'] . '<br/>';
                    echo $val['article'] . '<br/>';
                    echo $val[0] . '<br/>';
                    $idget = $val[0];
                    echo '
                    <li>
                    <a href="modifier_article.php?id=' . $idget . '">Modifier |</a>
                    <a href="supprimer.php?id=' . $idget . '">Supprimer</a>
                    </li><br/><br/>';
                }
            }
        }
    }

    public function AddCategorie()
    {
 if (isset($_POST['envoyer']) && !empty($_POST['nom'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $con = $this->connectDb();
            $stmt = $con->prepare(" INSERT INTO categories (`nom`) VALUES ('$nom') ");
            $stmt->execute();
            header('location:http://localhost:8888/blog/admin.php');
        }
    }
}
?>