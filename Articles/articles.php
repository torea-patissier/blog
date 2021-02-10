<?php session_start();

include "../Classes/articles.class.php";
require_once('../html_partials/header.php');


$ARTICLES = new Articles;

?>
<?php

$ARTICLES->filterCategory();

        // On détermine sur quelle page on se trouve
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Liste des articles</h1>
                <?= $ARTICLES->showArticles();?>
                    
                    <form action="" method="GET">
                        <select name="filterArticle">
                            <?=$ARTICLES->filterForm();?>
                        </select>
                        <input type="submit" name="Valider" value="Filtrer">
                    </form>

                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                    
                    <?php $articlesPagination = $ARTICLES->getPagination($_GET['page'], $articles, $page, $pages);
                    foreach($articles as $page){

                    echo '<li class="page-item' . ($currentPage == 1) ? 'disabled' : "" . '">
                            
                            <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>

                        </li>';

                        for($page = 1; $page <= $pages; $page++){
                        
                        echo '<li class="page-item' . ($currentPage == $page) ? 'active' : "" . '">

                                <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>

                            </li>';
                        }

                        echo '<li class="page-item' . ($currentPage == $pages) ? "disabled" : "" . '">

                            <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>

                        </li>';
                    }
                    ?>
                    </ul>
                </nav>
            </section>
        </div>
    </main>
<?=require_once('../html_partials/footer.php');?>
</html>