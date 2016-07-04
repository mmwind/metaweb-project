<?php
/*
require_once "/engine/MetaEngine.php";
$eng = new MetaEngine();
$eng->uid = 1;
$eng->loadCurrentUser();

//VAR_DUMP($eng->getUser());
//$eng->loadMessages();
//VAR_DUMP($eng->incomingMessages);
//VAR_DUMP($eng->outcomingMessages);
$order = new Order();
$order->setAmount(10.0);
$order->setOpenedAt('NOW()');
$order->setCurrency('CRD');
$order->setRuid(2);
$order->setComment('Подношение Богам');

$eng->placeOrder($order);
echo 'Payment sended!';*/

require_once "/engine/MetaEngine.php";

$eng = new MetaEngine();

$eng->renderPage('profile');

?>