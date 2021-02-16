<?php
session_start();
require_once('html_partials/header.php');
require_once('classes/modifier_categorie.class.php');

$MODIF_CATEGORIE = new ModifCat();
$MODIF_CATEGORIE->ShowCategorieToModif();
echo'<br />';
$MODIF_CATEGORIE->ModifCategorie();

?>