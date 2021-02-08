<?php
session_start();
require_once('classes/bdd.php');
require_once('classes/supprimer.class.php');

$DELETE = new Delete;
$DELETE->DeleteArticle();

?>