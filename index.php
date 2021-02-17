<?php session_start();
require_once('html_partials/header.index.php');

include "Classes/index.class.php";
$pageIndex = new Index;
?>


<?=$pageIndex->showLastArticles();?>


<?= require_once('html_partials/footer.php'); ?>