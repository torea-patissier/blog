<?php
// Vue qui va afficher les articles

foreach ($articles as $article):
?>
<h2>
<?php $article->article()?>
</h2>
<?php endforeach?>