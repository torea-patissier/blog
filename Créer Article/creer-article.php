<?php
session_start();
require_once("../html_partials/header.php");
include "../Classes/creer-article.class.php";
$pageCreate = new Article;
?>

<br />

<form action="creer-article.php" method="POST">
    <div class="paginationArticles1">
<label>Quelle est la catégorie de votre article ?</label><br /><br />
<select class="buttonCommentaireArticle" name="category">
<?=$pageCreate->selectCategory();?>
</select>
<br /><br />
<label for="story">Redigez votre artricle:</label><br /><br />
<textarea name="newarticle" rows="10" cols="66"> Ecrivez votre article ici..</textarea><br />
<input class ="buttonCommentaireArticle"type="submit" name="publier">
</div>
</form>


<?php 


if(isset($_POST["publier"]) && !empty($_POST["newarticle"])){
    $pageCreate->CreateArticle();

}