<?php
session_start();
require_once("../html_partials/header.php");
include "../Classes/creer-article.class.php";
$ARTICLE = new Article;
?>

<br />
<form action="creer-article.php" method="POST">
<label>Quelle est la catégorie de votre article ?</label><br /><br />
<select name="category">
<?=$ARTICLE->selectCategory();?>
</select>
<br /><br />

<label for="story">Redigez votre artricle:</label><br /><br />

<textarea name="newarticle" rows="10" cols="66">
Père Tounelard, raconte nous une histoire..
</textarea><br />
<input type="submit" name="publier">
</form>


<?php 


if(isset($_POST["publier"]) && !empty($_POST["newarticle"])){
$ARTICLE->CreateArticle();

}