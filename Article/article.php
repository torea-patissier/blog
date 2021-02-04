<?php session_start();

require_once('../html_partials/header.php');
include "../Classes/article.class.php";
if (!isset($_SESSION["usersInfo"])) $_SESSION["usersInfo"] = array();

$ARTICLE = new LastArticle;

$ARTICLE->getUsersInfo();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Article</title>
</head>
<body>
<?php
if(isset($_GET["id"])){
   $ARTICLE->showSelectedArticle();
}
?>

<?=$ARTICLE->showComments();?>
<?=var_dump($_SESSION["usersInfo"]);?>
<form action="" method="POST">
<input type="text" name="CommentSection">
</form>
</body>
</html>

