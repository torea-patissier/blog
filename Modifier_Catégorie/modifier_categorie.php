<?php
session_start();
require_once('../html_partials/header.php');
require_once('../Classes/modifier_categorie.class.php');

$pageModifCategorie = new ModifCat();
$pageModifCategorie->ShowCategorieToModif();
echo'<br />';
$pageModifCategorie->ModifCategorie();

?>