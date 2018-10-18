<?php

require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

$db = new myDB;
$db->connect();

if($_POST['up']){
	$db->up();
}else if($_POST['down']){
	$db->down();
}
$itr = $db->itr;
$err = $db->err;

$db->close();
require_once('index.html');

?>