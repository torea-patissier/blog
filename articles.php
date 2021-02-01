<?php
    session_start();
require_once('html_partials/header.php');
var_dump($_SESSION['user']['id']);
?>