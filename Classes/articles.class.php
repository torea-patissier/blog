<?php

require_once("../Classes/bdd.class.php");

class pageArticles extends bdd
{

    public function Pagination()
    {
        //Connexion Bdd
        $con = $this->connectDb();
        $page = intval($_GET['page']); //conversion forcée en entier
    //Si le nombre est invalide, on demande la première page par défaut
    if($page <= 0){
        $page = 1;
    }

    $limite = 5;

    $resultFoundRows = $con->query("SELECT count(id) FROM articles");
    $nombreElementsTotal = $resultFoundRows->fetchColumn();
    $debut = ($page - 1) * $limite;
    // Partie "Requête"
    //  On construit la requête, en remplaçant les valeurs par des marqueurs. Ici, on
    //  n'a qu'une valeur, limite. On place donc un marqueur là où la valeur devrait se
    //  trouver, sans oublier les deux points « : » 
            
    $query = "SELECT * FROM categories INNER JOIN articles ON articles.id_categorie = categories.id ORDER BY date DESC LIMIT :limite OFFSET :debut";
    $query = $con->prepare($query);
    //On lie les valeurs
    $query->bindValue('limite', $limite, PDO::PARAM_INT);
    $query->bindValue('debut', $debut, PDO::PARAM_INT);
    $query->execute();

    //Partie Boucle
    while($element = $query->fetch()){
        echo ucfirst(strtolower($element['nom'])) . "<br /><br />";
        echo $element['article'] . "<br /><br />";
        echo $element['date'] . "<br /><br />" ;
    }

?>

<?php
    //On calcule le nombre de pages
    $nombreDePages = ceil($nombreElementsTotal / $limite);

    /* Si on est sur la première page, on n'a pas besoin d'afficher de lien*/
    /* vers la précédente. On va donc ne l'afficher que si on est sur une autre*/
    /* page que la première*/

    if($page > 1):
        ?><a href="?page=<?php echo $page - 1; ?>">Page précédente</a> 
    <?php endif;

    for($i = 1; $i <= $nombreDePages; $i++):
        ?><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php endfor;

    //Avec le nombre total de pages, on peut aussi masquer le lien vers la page sivante quand on est sur la derniere//
    if($page < $nombreDePages):
        ?><a href="?page=<?php echo $page + 1; ?>">Page suivante</a>
    <?php endif;?><?php
    }

}


?>