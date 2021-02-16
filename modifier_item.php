<?php
session_start();
require_once('html_partials/header.php');
require_once('../Classes/modifier_article.class.php');

$MODIF_ARTICLE = new ModifArticle();
$MODIF_ARTICLE->ShowArtToModif();
$MODIF_ARTICLE->ModifArt();

?>