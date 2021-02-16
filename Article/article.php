<?php session_start();

require_once('../html_partials/header.php');
include "../Classes/article.class.php";
if (!isset($_SESSION["usersInfo"])) $_SESSION["usersInfo"] = "";
if (!isset($_SESSION["articleInfo"])) $_SESSION["articleInfo"] = "";

$Aid = $_SESSION["articleInfo"];

$pageArticle = new LastArticle;

$pageArticle->getUsersInfo();
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

$pageArticle->showSelectedArticle();



$pageArticle->showComments();
?>

<form action="" method="POST">
<input type="text" name="CommentSection">
<input type="submit" name="PublierCommentaire">
</form>

<?php 

if(isset($_POST["PublierCommentaire"]) && !empty($_POST["CommentSection"])){
   $pageArticle->publierCommentaire();
   header("Refresh: 0;url=article.php?id=$Aid");
}
?>


</body>
</html>

