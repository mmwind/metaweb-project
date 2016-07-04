<?php
require_once "/vendor/autoload.php";
require_once "/engine/MetaEngine.php";
require_once "/entity/User.php";

/*$eng = new MetaEngine();
//$eng->uid = 1;
$user = $eng->loadUser(1);

$array = (array) $user;
$classname = get_class($user);
foreach ($array as $key => $value) { 
    echo str_replace("User", "", $key).' ';
}*/
session_start();
$_SESSION['id'] = 2;

?>