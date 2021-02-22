<?php session_start();
require_once('html_partials/header.index.php');

include "Classes/index.class.php";
$pageIndex = new Index;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?=$pageIndex->showLastArticles();?>


<?= require_once('html_partials/footer.index.php'); ?>