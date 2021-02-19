<?php

require_once("bdd.class.php");

class Articles extends bdd
{
    public function Pagination()
    {
        //Connexion Bdd
        $con = $this->connectDb();
        $page = intval($_GET['page']); //conversion forcée en entier
        //Si le nombre est invalide, on demande la première page par défaut
        if ($page <= 0) {
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
        while ($element = $query->fetch()) {
            $id = $element['id'];
            echo '<div class=" ArticlesCategorie">'.ucfirst(strtolower($element['nom'])) . "</div><br /><br />";
            echo '<div class=" paginationArticles"><a href="../Article/article.php?id='. $id . '">'.$element['article'] . '</a>'."<br /><br />";
            echo $element['date'] . "<br /><br /></div>";
            echo'<br />';
        }
?>
        <?php
        //On calcule le nombre de pages
        $nombreDePages = ceil($nombreElementsTotal / $limite);

        /* Si on est sur la première page, on n'a pas besoin d'afficher de lien*/
        /* vers la précédente. On va donc ne l'afficher que si on est sur une autre*/
        /* page que la première*/

        if ($page > 1) :
        ?><a href="?page=<?php echo $page - 1; ?>">Page précédente</a>
        <?php endif;

        for ($i = 1; $i <= $nombreDePages; $i++) :
        ?><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor;

        //Avec le nombre total de pages, on peut aussi masquer le lien vers la page sivante quand on est sur la derniere//
        if ($page < $nombreDePages) :
        ?><a href="?page=<?php echo $page + 1; ?>">Page suivante</a>
            <?php endif; ?><?php
                        }

                        public function CategoryPagination()
                        {
                            $con = $this->connectDb();
                            $requete = "SELECT * FROM categories";
                            $req = $con->prepare($requete);
                            $req->execute();
                            $result = $req->fetchAll(PDO::FETCH_ASSOC);

                            $query = "SELECT * FROM categories INNER JOIN articles ON articles.id_categorie = categories.id";
                            $req = $con->prepare($query);
                            $req->execute();
                            $move = $req->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $resultat) {
                                $idCategorie = $resultat['id'];
                                $nom = $resultat['nom'];
                                echo '<br />';
                                echo '<li><a href="../Filtre_Articles/filtre_articles.php?id=' . $idCategorie . '">' . $nom . '</a></li>';
                                echo '<br />';


                            }
                        }

                        public function FiltreArticles()
                        {
                            $con = $this->connectDb();
                            $id = $_GET['id'];
                            $req = $con->prepare("SELECT * FROM categories INNER JOIN articles  ON articles.id_categorie = categories.id  WHERE id_categorie = :id ");
                            $req->bindValue('id', $id, PDO::PARAM_INT);
                            $req->execute();
                            $result = $req->fetchAll();

                            foreach ($result as $key) {
                            
                                $article = $key['article'];
                                $date = $key['date'];
                                $categorie = $key['article'];
                                $id = $key['id'];

                                echo '<a href="../Article/article.php?id='.$id. '">'. $article. '</a>'.'<br />';
                                echo $date.'<br />'.'<br />';


                            }
                        }
                        public function CategoryPaginationIndex()
                        {
                            $con = $this->connectDb();
                            $requete = "SELECT * FROM categories";
                            $req = $con->prepare($requete);
                            $req->execute();
                            $result = $req->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $resultat) {
                                $idCategorie = $resultat['id'];
                                $nom = $resultat['nom'];
                                echo '<br />';
                                echo '<li><a href="http://localhost:8888/blog/Filtre_Articles/filtre_articles.index.php?id=' . $idCategorie . '">' . $nom . '</a></li>';
                                echo '<br />';


                            }
                        }

                        public function FiltreArticlesIndex()
                        {
                            $con = $this->connectDb();
                            $id = $_GET['id'];
                            $req = $con->prepare("SELECT * FROM categories INNER JOIN articles  ON articles.id_categorie = categories.id  WHERE id_categorie = :id ");
                            $req->bindValue('id', $id, PDO::PARAM_INT);
                            $req->execute();
                            $result = $req->fetchAll();

                            foreach ($result as $key) {
                            
                                $article = $key['article'];
                                $date = $key['date'];
                                $categorie = $key['article'];
                                $id = $key['id'];

                                echo '<a href="http://localhost:8888/blog/Article/article.php?id='.$id. '">'. $article. '</a>'.'<br />';
                                echo $date.'<br />'.'<br />';


                            }
                        }
                    }
?>

