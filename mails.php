<?php
require_once "/vendor/autoload.php";
require_once "./controllers/mails.php";
require_once "/engine/MetaEngine.php";

$eng = new MetaEngine();
$eng->renderPage('mails');

?>