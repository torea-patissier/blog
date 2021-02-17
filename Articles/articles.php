<?php session_start();

include "../Classes/articles.class.php";
require_once('../html_partials/header.php');


$pageArticles = new Articles;
$pageArticles->Pagination();
?>
