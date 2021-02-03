<?php session_start();

include "../Classes/article.class.php";

$ARTICLE = new LastArticle;

$infoUser= getUsername();
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

<form action="" method="POST">
<input type="text" name="CommentSection">
</form>
</body>
</html>

