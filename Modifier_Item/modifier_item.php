<?php
session_start();
require_once('../html_partials/header.php');
require_once('../Classes/modifier_article.class.php');
echo'<main class="paginationArticles1">';
$pageModifArticle = new ModifArticle();
$pageModifArticle->ShowArtToModif();
$pageModifArticle->ModifArt();
echo'</main>';
require_once('../html_partials/footer.php');
?>