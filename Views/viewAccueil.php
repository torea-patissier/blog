<?php

foreach($articles as $article): ?>
<h2><?= $article->article() ?></h2>
<time><?= $article->date() ?></time>


<?php endforeach; ?>