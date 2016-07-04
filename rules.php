<?php
require_once "/vendor/autoload.php";
require_once "./controllers/rules.php";
require_once "/engine/MetaEngine.php";

$eng = new MetaEngine();
$eng->renderPage('rules');

?>