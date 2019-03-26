<?php
$db_host='localhost';
$db_user='root';
$db_pwd='';
$database='cart';
//
// if(!mysql_connect($db_host,$db_user,$db_pwd))
// die("can't Connect to Database");
//
// if(!mysql_select_db($database))
// die("can't Select Database");

session_start();
session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
