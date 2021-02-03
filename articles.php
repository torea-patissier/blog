<?php
    session_start();
require_once('html_partials/header.php');

include "classes/articles.class.php";

$ARTICLES = new Articles;

$ARTICLES->showArticles();

?>
<div class="dropdown-menu">
  <ul>
    <li><a href="#" onclick="alert('l')">Item 1</a></li>
    <li><a href="#" onclick="alert('o')">Item 2</a></li>
    <li><a href="#" onclick="alert('c')">Last Item</a></li>
  </ul>
</div>