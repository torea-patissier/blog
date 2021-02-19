<?php
session_start();
require_once('../html_partials/header.php');
require_once('../Classes/modifier_article.class.php');

$pageModifArticle = new ModifArticle();
$pageModifArticle->ShowArtToModif();
echo'<br />';
$pageModifArticle->ModifArt();

?>