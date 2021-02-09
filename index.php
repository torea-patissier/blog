<?php session_start();
require_once('html_partials/header.php');

include "Classes/index.class.php";
$INDEX = new Index;
?>


<?=$INDEX->showLastArticles();?>


<?= require_once('html_partials/footer.php'); ?>