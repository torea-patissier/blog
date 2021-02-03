<?php
    session_start();
require_once('html_partials/header.php');
require_once('classes/article.class.php');
$ARTICLE = new Article;
$ARTICLE->showUniqueArticle();
?>
