<?php
session_start();
require_once('html_partials/header.php');
require_once('..Classes/articles.class.php');

$Article_filtre = new Articles;
$Article_filtre->FiltreArticles();
?>