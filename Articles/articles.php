<?php session_start();

include "../Classes/articles.class.php";
require_once('../html_partials/header.php');
require_once('../html_partials/footer.php');


$pageArticles = new Articles;
$pageArticles->Pagination();
?>
