<?php session_start();
require_once('html_partials/header.index.php');

include "Classes/index.class.php";
$pageIndex = new Index;
?>
<main>
<img  class="imgIndex" src="Images/photoblog3.jpg">
<?=$pageIndex->showLastArticles();?>

</main>

<?php require_once('html_partials/footer.index.php'); ?>