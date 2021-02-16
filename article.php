<?php
    session_start();
require_once('html_partials/header.php');
require_once('classes/article.class.php');

if(!isset($_GET['id'])){
    header('location:http://localhost:8888/blog/index.php');
    exit();
}
$ARTICLE = new Article;
$ARTICLE->showUniqueArticle();
?>
