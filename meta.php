<?php
require_once "/engine/Engine.php";
require_once "/vendor/autoload.php";
require_once "./controllers/news.php";
/*
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('meta.log', Logger::WARNING));

// add records to the log
$log->addWarning('Foo');
$log->addError('Bar');

$loader = new Twig_Loader_Array(array(
    'index' => 'Hello {{ name }}!',
));
$twig = new Twig_Environment($loader);

echo $twig->render('index', array('name' => 'Fabien'));*/

require_once "/engine/MetaEngine.php";

$eng = new MetaEngine();
/*
$controller = new newsController($eng);
$controller->runController();
$controller->renderView();*/
$eng->renderPage('profile');

?>