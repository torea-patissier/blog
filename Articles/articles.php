<?php session_start();

include "../Classes/articles.class.php";
require_once('../html_partials/header.php');

$pageArticles = new pageArticles;



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>

<?=$pageArticles->Pagination();?>
</body>
</html>
