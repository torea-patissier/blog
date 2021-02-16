<?php
session_start();
require_once('html_partials/header.php');
require_once('../Classes/modifier_utilisateur.class.php');

$USER = new ModifUser();
$USER->ShowUtilisateur();
?>