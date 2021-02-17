<?php
session_start();
require_once('../Classes/bdd.class.php');
require_once('../Classes/supprimer.class.php');

$pageSuppr = new Delete;
$pageSuppr->DeleteArticle();

?>