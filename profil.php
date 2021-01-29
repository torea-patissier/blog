<?php
require_once('html_partials/header.php');
var_dump($_SESSION['user']);
echo'<br/>';
var_dump($_SESSION['user']['id_droits']);
?>