<?php
session_start();
require_once('html_partials/header.php');
require_once('classes/modifier_article.class.php');

$MODIF_ARTICLE = new ModifArticle();
$MODIF_ARTICLE->ShowArtToModif();
echo'<br />';
$MODIF_ARTICLE->ModifArt();

?>

