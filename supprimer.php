<?php
session_start();
require_once('../Classes/bdd.class.php');
require_once('../Classes/supprimer.class.php');

$DELETE = new Delete;
$DELETE->DeleteArticle();

?>