<?php session_start();

include "../Classes/articles.class.php";
require_once('../html_partials/header.php');
echo'<main>';
$pageArticles = new Articles;
$pageArticles->Pagination();
echo'</main>';
require_once('../html_partials/footer.php');?>
