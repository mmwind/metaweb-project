<?php
require_once "/vendor/autoload.php";
require_once "./controllers/news.php";
require_once "/engine/MetaEngine.php";

$eng = new MetaEngine();
$eng->renderPage('news');

?>