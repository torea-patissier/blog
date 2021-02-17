<?php
session_start();
require_once('../html_partials/header.php');
require_once('../Classes/articles.class.php');

$pageFiltres = new Articles;
$pageFiltres->FiltreArticlesIndex();

?>