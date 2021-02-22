<?php
session_start();
require_once('../html_partials/header.php');
require_once('../Classes/articles.class.php');
?>
<main>
<?php
$pageFiltres = new Articles;
$pageFiltres->FiltreArticlesIndex();
?>
 </main>
 <?php require_once('../html_partials/footer.php');?>
