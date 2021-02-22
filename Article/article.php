<?php session_start();

require_once('../html_partials/header.php');
include "../Classes/article.class.php";
if (!isset($_SESSION["usersInfo"])) $_SESSION["usersInfo"] = "";
if (!isset($_SESSION["articleInfo"])) $_SESSION["articleInfo"] = "";

$Aid = $_SESSION["articleInfo"];

$pageArticle = new LastArticle;

$pageArticle->getUsersInfo();
?>
<main class="paginationArticles1">
   <div class="borderArticle">
      <?php
      $pageArticle->showSelectedArticle();
      $pageArticle->showComments();
      ?>
         <form action="" method="POST">
            <input class="buttonCommentaireArticle" type="text" name="CommentSection" placeholder="Répondre ici">
            <input class="buttonCommentaireArticle" type="submit" name="PublierCommentaire" value="Envoyer">
         </form>
   </div>

   <?php

   if (isset($_POST["PublierCommentaire"]) && !empty($_POST["CommentSection"])) {
      $pageArticle->publierCommentaire();
      header("Refresh: 0;url=article.php?id=$Aid");
   }
   ?>
</main>
<?php require_once('../html_partials/footer.php');?>

