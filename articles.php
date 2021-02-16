<?php session_start();

include "classes/articles.class.php";
require_once('html_partials/header.php');


$Articles = new Articles;
$Articles->Pagination();
?>
