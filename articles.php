<?php
    session_start();
require_once('html_partials/header.php');

include "classes/articles.class.php";

$ARTICLES = new Articles;

$ARTICLES->showArticles();

?>
