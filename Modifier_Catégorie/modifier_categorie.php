<?php
session_start();
require_once('../html_partials/header.php');
require_once('../Classes/modifier_categorie.class.php');
echo'<main class="paginationArticles1">';
$pageModifCategorie = new ModifCat();
$pageModifCategorie->ShowCategorieToModif();
echo'<br />';
$pageModifCategorie->ModifCategorie();
echo'</main>';
require_once('../html_partials/footer.php');

?>