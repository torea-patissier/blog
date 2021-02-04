<?php
session_start();
require_once('html_partials/header.php');

if($id_droits != 1337 &&  $id_droits != 42){
    header('location:http://localhost:8888/blog/index.php');
exit();

}
include "classes/creer-article.class.php";
$ARTICLE = new Article;

?>
<br />
<form action="creer-article.php" method="POST">
<label>Quelle est la catégorie de votre article ?</label><br /><br />
<select name="category">
   <option valeur="1">Rugby</option>
   <option valeur="3">Football</option>
   <option valeur="4">Golf</option>
   <option valeur="99">Autre</option>
</select>
<p>Veuillez rédiger votre article</p>
<input type="text" width="" height="" name="newArticle" style="width:600px; padding-bottom:300px;"><br />
<input type="submit" name="publier">
</form>


<?php 
if(isset($_POST["publier"])){
$ARTICLE->CreateArticle();
header('location:http://localhost:8888/blog/articles.php');
}
?>

