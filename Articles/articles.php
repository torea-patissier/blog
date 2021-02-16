<?php session_start();

include "../Classes/articles.class.php";
require_once('html_partials/header.php');


$Articles = new Articles;
$Articles->Pagination();
?>
